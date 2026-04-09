# Post-Lab Questions & AJAX Implementations

## Question 1: AJAX Registration Flow
**Design a user registration form that submits data via AJAX. Upon successful submission, display a confirmation message dynamically on the same page without reloading. Explain how you would handle error messages and form validation using jQuery.**

We intercept the form submit with `e.preventDefault()` and validate inputs client-side first.
If valid, `$.ajax()` POSTs the serialized data to the server.
The `.done()` callback checks the JSON response status and shows either a success message or an error.

```javascript
$('#registerForm').on('submit', function(e) {
    e.preventDefault();
    $('.error-message').text('');
    
    let email = $('#email').val();
    if(email === "") {
        $('#emailError').text("Email is required");
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'process_register.php',
        data: $(this).serialize(),
        dataType: 'json'
    }).done(function(response) {
        if(response.status === 'success') {
            $('#formContainer').html('<div class="success">Registration Complete!</div>');
        } else {
            $('#generalError').text(response.message);
        }
    }).fail(function() {
         $('#generalError').text("Network error occurred.");
    });
});
```

---

## Question 2: AJAX Live Search
**Create a live search feature for a product catalog webpage. When users type in a search query, AJAX should fetch filtered product results from the server without refreshing the page. Describe how you would set up the server endpoint and handle the search input using jQuery.**

On `keyup`, we send the query to the server which runs a `LIKE '%term%'` SQL query.
A 300ms debounce prevents firing a request on every keystroke.

```javascript
let typingTimer;

$('#searchBox').on('keyup', function() {
    clearTimeout(typingTimer);
    let query = $(this).val();

    typingTimer = setTimeout(function() {
        if(query.length >= 2) {
            $.ajax({
                url: 'search_results.php',
                method: 'GET',
                data: { q: query }
            }).done(function(htmlData) {
                $('#resultsContainer').html(htmlData);
            });
        } else {
            $('#resultsContainer').empty();
        }
    }, 300);
});
```

---

## Question 3: AJAX Pagination Integration ("Load More")
**Implement a "Load More" button for a blog homepage that fetches additional posts when clicked... Discuss the necessary jQuery methods and how you would manage the loading state.**

A client-side `offset` tracks loaded posts.
Each click sends it to the server, which fetches the next batch with `LIMIT`/`OFFSET`.
New posts are appended with `.append()`, and the button is disabled during loading to prevent duplicate clicks.

```javascript
let currentOffset = 10;

$('#loadMoreBtn').on('click', function() {
    let btn = $(this);
    btn.prop('disabled', true).text('Loading...');

    $.ajax({
        url: 'fetch_posts.php',
        method: 'GET',
        data: { offset: currentOffset, limit: 5 }
    }).done(function(newPostsHtml) {
        if(newPostsHtml.trim() === '') {
            btn.text('No more posts');
        } else {
            $('#blogContainer').append(newPostsHtml);
            currentOffset += 5;
            btn.prop('disabled', false).text('Load More');
        }
    });
});
```

---

## Question 4: Dynamic AJAX Dashboard
**Develop a dashboard that fetches and displays user statistics using AJAX. When a user selects a date range, the dashboard should dynamically update the graphs without refreshing.**

On date range `change`, AJAX sends the selection to the server.
The server returns aggregated JSON which we feed into a Chart.js instance and call `.update()`.

```javascript
$('#dateRangeSelect').on('change', function() {
    let selectedRange = $(this).val();

    $.ajax({
        url: 'get_dashboard_stats.php',
        type: 'POST',
        data: { range: selectedRange },
        dataType: 'json'
    }).done(function(chartData) {
        myChart.data.labels = chartData.labels;
        myChart.data.datasets[0].data = chartData.values;
        myChart.update();
    });
});
```

---

## Question 5: Session & Cookie Vulnerabilities
**Discuss potential security vulnerabilities associated with the use of sessions and cookies... What is session hijacking? What countermeasures can be implemented?**

Session hijacking is when an attacker steals a session ID (via sniffing, XSS, or guessing) and impersonates the user.

Countermeasures:
1. **Regenerate session IDs** after login with `session_regenerate_id(true)`.
2. **Use HTTPS** so cookies can't be sniffed.
3. **Set HttpOnly** so JavaScript can't access the cookie.
4. **Bind sessions to IP/User-Agent** and invalidate on mismatch.

---

## Question 6 & 7: Cookie Expiration Strategies
**Analyze the impact of cookie expiration settings on user experience in a web application. How would you determine the appropriate expiration time for cookies used in the "remember me" functionality? Additionally, discuss the implications of using persistent vs. session cookies for user authentication and how each affects user privacy and application security.**

Too short an expiration forces constant re-login. Too long and shared/stolen devices become a risk.
For "Remember Me", 30 days (`time() + 86400 * 30`) is the standard balance.

**Session cookies** live in memory and vanish when the browser closes — safer, but users must log in each session.

**Persistent cookies** are written to disk with an expiry date — they enable "Remember Me" but the token can be extracted by malware or physical access.
Mark them `HttpOnly` and `Secure` to reduce risk.
Persistent cookies also make user tracking easier, so session cookies are better for privacy.

---

## Conclusion

In this experiment we built a PHP/MySQL authentication system with secure registration (`password_hash`), login verification (`password_verify`), session management, and persistent "Remember Me" cookies.
We also implemented AJAX patterns — form submission, live search, pagination, and dynamic dashboards — using jQuery.
On the security side, we covered session hijacking countermeasures, XSS prevention, and cookie expiration tradeoffs.
