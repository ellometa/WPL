# BentoBooks - Code Examples By Task

---

## Task 1: Inline CSS for Header

The header in `index.html` uses **inline styles** for background color, border, padding, text color, text shadow, and font size.

```html
<header style="background-color: #2c3e50; border-bottom: 5px solid #4a90a4; padding: 40px 20px;">
  <h1
    style="
      color: #e7f9a9;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
      margin: 0;
      font-size: 2.5em;
    "
  >
    BentoBooks
  </h1>

  <p
    style="
      text-align: center;
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.2em;
      margin: 10px 0 0 0;
    "
  >
    Your Gateway to Infinite Stories
  </p>
</header>
```

**Concepts demonstrated:** Inline `style` attribute, `background-color`, `border-bottom`, `text-shadow`, `color`, `font-size`, `padding`, `margin`.

---

## Task 5: Book Card Styling with `.book-card`

### HTML (`book-details.html`) — Example of a single book card:

```html
<div class="book-card">
  <img
    src="https://m.media-amazon.com/images/I/71wANojhEKL._AC_UF1000,1000_QL80_.jpg"
    alt="1984"
    class="book-image"
  />
  <h3>1984</h3>
  <p>George Orwell</p>
  <div class="rating">5/5</div>
  <p class="review">
    Big Brother is watching you, and you LOOKING FABULOUS OMG!
  </p>
  <p class="price">$150</p>
</div>
```

### CSS (`styles.css`) — Book card styles:

```css
.book-card {
    display: inline-block;
    vertical-align: top;
    width: 28%;
    min-width: 250px;
    margin: 1.5%;
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    box-sizing: border-box;
}

.book-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.book-image {
    width: 200px;
    height: 300px;
    object-fit: cover;
    border-radius: 5px;
    margin-bottom: 10px;
    border: 2px solid #ccc;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.book-image:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.rating {
    color: #f39c12;
    font-size: 1.2em;
    margin: 8px 0;
    font-weight: bold;
}

.review {
    font-style: italic;
    color: #555;
    font-size: 0.85em;
    line-height: 1.4;
    min-height: 40px;
}

.price {
    font-weight: bold;
    color: #e74c3c;
    font-size: 1.1em;
    margin-top: 10px;
}
```

### HTML (`index.html`) — Featured Books grid on homepage:

```html
<article>
  <h2>Featured Books</h2>
  <div class="book-grid">
    <style>
      .book-grid {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 2rem;
      }
    </style>
    <div class="book-card">
      <a href="book-details.html" style="text-decoration: none; color: inherit;">
        <img
          src="https://m.media-amazon.com/images/S/compressed.photo.goodreads.com/books/1650033243i/41733839.jpg"
          alt="The Great Gatsby"
          class="book-image"
        />
        <h3>The Great Gatsby</h3>
        <p class="price">$150</p>
      </a>
    </div>
    <!-- More book cards... -->
  </div>
</article>
```

**Concepts demonstrated:** Class selectors, `display: inline-block`, `box-shadow`, `border-radius`, `transition`, `transform`, hover effects, `object-fit`.

---

## Task 7: External CSS for Tables

### HTML (`about-books.html`) — Linking external CSS + Table structure:

```html
<head>
  <link rel="stylesheet" href="table.css" />
</head>
```

```html
<table>
  <caption>Popular Books - Price & Availability Guide</caption>

  <thead>
    <tr>
      <th>Book Name</th>
      <th>Author</th>
      <th>Price</th>
      <th>Availability</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>The Great Gatsby</td>
      <td>F. Scott Fitzgerald</td>
      <td>$150</td>
      <td class="available">In Stock</td>
    </tr>
    <tr>
      <td>1984</td>
      <td>George Orwell</td>
      <td>$150</td>
      <td class="available">In Stock</td>
    </tr>
    <tr>
      <td>To Kill a Mockingbird</td>
      <td>Harper Lee</td>
      <td>$150</td>
      <td class="limited">Limited Stock</td>
    </tr>
    <tr>
      <td rowspan="2">Complete Works of Shakespeare</td>
      <td rowspan="2">William Shakespeare</td>
      <td>$150 (Paperback)</td>
      <td class="available">In Stock</td>
    </tr>
    <tr>
      <td>$150 (Hardcover)</td>
      <td class="limited">Limited Stock</td>
    </tr>
    <tr>
      <td>The Catcher in the Rye</td>
      <td>J.D. Salinger</td>
      <td>$150</td>
      <td class="out-of-stock">Out of Stock</td>
    </tr>
    <tr>
      <td colspan="2"><strong>Bundle: Classic Collection (5 Books)</strong></td>
      <td>$150</td>
      <td class="available">In Stock</td>
    </tr>
  </tbody>

  <tfoot>
    <tr>
      <td colspan="2">Total Books Available</td>
      <td colspan="2">7 Titles | Free Shipping on orders over $150</td>
    </tr>
  </tfoot>
</table>
```

### CSS (`table.css`) — Complete file:

```css
table {
    width: 100%;
    max-width: 900px;
    margin: 20px auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
}

caption {
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
}

thead {
    background-color: #4a90a4;
    color: white;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: left;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #e8f4f8;
}

tfoot {
    background-color: #333;
    color: white;
    font-weight: bold;
}

.available {
    color: green;
    font-weight: bold;
}

.limited {
    color: orange;
    font-weight: bold;
}

.out-of-stock {
    color: red;
    font-weight: bold;
}
```

**Concepts demonstrated:** External stylesheet (`<link>`), `border-collapse`, `thead`/`tbody`/`tfoot`, `rowspan`, `colspan`, `caption`, `nth-child(even)`, hover effects on rows, class-based status coloring.

---

## Task 8: External CSS for Forms

### HTML (`registration-form.html`) — Linking external CSS + Form structure:

```html
<head>
  <link rel="stylesheet" href="form.css" />
</head>
```

```html
<form action="#" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Personal Information</legend>

    <label for="fullname">Full Name <span style="color: red;">*</span></label>
    <input
      type="text" id="fullname" name="fullname"
      placeholder="Enter your full name"
      required autofocus
      pattern="[A-Za-z\s]{2,50}"
      title="Name should contain only letters and spaces (2-50 characters)"
    />

    <label for="email">Email Address <span style="color: red;">*</span></label>
    <input type="email" id="email" name="email" placeholder="example@email.com" required />

    <label for="phone">Phone Number</label>
    <input type="tel" id="phone" name="phone" placeholder="(123) 456-7890" />

    <label for="dob">Date of Birth <span style="color: red;">*</span></label>
    <input type="date" id="dob" name="dob" required />
  </fieldset>

  <fieldset>
    <legend>Account Information</legend>
    <label for="username">Username <span style="color: red;">*</span></label>
    <input type="text" id="username" name="username" placeholder="Choose a username"
      required pattern="[A-Za-z0-9_]{4,20}" />

    <label for="password">Password <span style="color: red;">*</span></label>
    <input type="password" id="password" name="password"
      placeholder="Create a strong password" required pattern=".{8,}" />
  </fieldset>

  <fieldset>
    <legend>Preferences</legend>

    <label>Gender</label>
    <div class="radio-group">
      <input type="radio" id="male" name="gender" value="male" />
      <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" />
      <label for="female">Female</label>
    </div>

    <label>Favorite Genres</label>
    <div class="checkbox-group">
      <input type="checkbox" id="fiction" name="genres" value="fiction" />
      <label for="fiction">Fiction</label>
      <input type="checkbox" id="mystery" name="genres" value="mystery" />
      <label for="mystery">Mystery</label>
    </div>

    <label for="profilepic">Profile Picture</label>
    <input type="file" id="profilepic" name="profilepic" accept="image/*" />
  </fieldset>

  <div style="text-align: center; margin-top: 20px;">
    <input type="submit" value="Create Account" />
    <input type="reset" value="Clear Form" />
  </div>
</form>
```

### CSS (`form.css`) — Complete file:

```css
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 30px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

fieldset {
    border: 2px solid #4a90a4;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
}

legend {
    font-weight: bold;
    font-size: 1.2em;
    color: #4a90a4;
    padding: 0 10px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="date"],
input[type="tel"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1em;
}

input:focus {
    outline: none;
    border-color: #4a90a4;
    box-shadow: 0 0 5px rgba(74, 144, 164, 0.3);
}

input[type="submit"] {
    background-color: #4a90a4;
    color: white;
    padding: 12px 30px;
    font-size: 1em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #3a7a94;
}

input[type="reset"] {
    background-color: #999;
    color: white;
}
```

**Concepts demonstrated:** External stylesheet, `fieldset`/`legend`, input types (`text`, `email`, `password`, `date`, `tel`, `file`, `radio`, `checkbox`), `pattern` attribute, `:focus` pseudo-class, `box-shadow`, attribute selectors (`input[type="text"]`).

---

## Task 9: Page Layout with Sidebar

### HTML (`index.html`) — Layout structure:

```html
<link rel="stylesheet" href="layout.css" />

<section class="main-layout">
  <div class="content-area">
    <!-- Main page content here -->
  </div>

  <aside class="sidebar">
    <h3>Explore Book Categories</h3>
    <div class="categories-container">
      <div class="category-card">
        <img src="..." alt="Top Categories" class="category-image" />
        <h4>Top Categories</h4>
        <div class="category-items">
          <span class="category-item">Fiction</span>
          <span class="category-item">Non-Fiction</span>
          <span class="category-item">Mystery & Thriller</span>
        </div>
      </div>
    </div>
  </aside>
</section>
```

### CSS (`layout.css`) — Complete file:

```css
.main-layout {
    display: flex;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    gap: 30px;
    align-items: flex-start;
}

.sidebar {
    flex: 0 0 250px;
}

.content-area {
    flex: 1;
}

@media (max-width: 768px) {
    .main-layout {
        flex-direction: column;
    }

    .sidebar {
        flex: auto;
        width: 100%;
    }
}
```

**Concepts demonstrated:** Flexbox layout (`display: flex`), `flex: 1` vs `flex: 0 0 250px`, `gap`, `@media` queries for responsive design, `flex-direction: column` for mobile.

---

## Task 10: CSS Animations & Highlighting Offers

### HTML (`offers.html`) — Offer cards with discount badges:

```html
<link rel="stylesheet" href="offers.css">

<div class="offers-container">
  <h1>Today's amazing Deals</h1>

  <div class="offer-card flash-sale">
    <span class="discount-badge">50% OFF</span>
    <div class="offer-title">Flash Sale: Classic Collection</div>
    <div class="offer-description">
      Get 50% off on all classic literature books! Including The Great Gatsby,
      1984, Pride and Prejudice, and more.
    </div>
    <span class="offer-code">USE CODE: BENTO50</span>
    <div class="timer">Ends in 2 hours!</div>
  </div>

  <div class="offer-card">
    <span class="discount-badge">30% OFF</span>
    <div class="offer-title">New Arrivals Special</div>
    <div class="offer-description">
      Discover the latest releases with 30% discount. Fresh titles added every week!
    </div>
    <span class="offer-code">USE CODE: BENTO30</span>
  </div>

  <div class="offer-card">
    <span class="discount-badge">FREE</span>
    <div class="offer-title">Free Shipping Weekend</div>
    <div class="offer-description">
      Enjoy free shipping on all orders over $150.
      No code needed - automatically applied at checkout!
    </div>
  </div>

  <div class="offer-card">
    <span class="discount-badge">2 FOR 1</span>
    <div class="offer-title">Buy One Get One Free</div>
    <div class="offer-description">
      Purchase any eBook and get another one of equal or lesser value for free!
    </div>
    <span class="offer-code">USE CODE: BENTO2026</span>
  </div>
</div>
```

### CSS (`offers.css`) — Glowing animation + offer card styles:

```css
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.offers-container {
    display: flex;
    flex-direction: column;
    gap: 30px;
    align-items: center;
    width: 100%;
    max-width: 800px;
    padding: 20px;
}

.offer-card {
    background-color: #f9f9f9;
    color: #333;
    padding: 30px;
    border-radius: 10px;
    width: 100%;
    text-align: center;
    position: relative;
    border: 2px solid #e74c3c;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    animation: pulse-glow 2s infinite;
}

@keyframes pulse-glow {
    0%   { box-shadow: 0 0 5px rgba(231, 76, 60, 0.5); }
    50%  { box-shadow: 0 0 20px rgba(231, 76, 60, 0.8); }
    100% { box-shadow: 0 0 5px rgba(231, 76, 60, 0.5); }
}

.discount-badge {
    background-color: #e74c3c;
    color: white;
    padding: 5px 15px;
    border-radius: 50px;
    font-weight: bold;
    position: absolute;
    top: -15px;
    right: -10px;
    transform: rotate(10deg);
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.offer-title {
    font-size: 2em;
    font-weight: bold;
    margin-bottom: 15px;
    color: #c0392b;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}

.offer-code {
    display: inline-block;
    background-color: #fff;
    color: #e74c3c;
    padding: 10px 20px;
    font-family: monospace;
}

.offer-code:hover {
    background-color: #e74c3c;
    color: white;
    box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
}

.timer {
    margin-top: 15px;
    font-size: 0.9em;
    color: #c0392b;
    font-weight: bold;
}
```

### Link from Homepage (`index.html`):

```html
<div style="text-align: center; margin: 40px 0;">
  <a href="offers.html" style="
    display: inline-block;
    background-color: #e74c3c;
    color: white;
    padding: 15px 30px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.2em;
    box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3);
  ">
    View All Special Offers &raquo;
  </a>
</div>
```

**Concepts demonstrated:** `@keyframes` animation, `animation` property, `box-shadow` pulsing, `position: absolute` for badges, `transform: rotate()`, `text-shadow`, hover color transitions.

---

## Shared Styles (`styles.css`) — Navigation

```css
nav {
    background: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    position: sticky;
    top: 0;
    z-index: 100;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: center;
}

nav li {
    display: inline-block;
    margin: 0 10px;
}

nav a {
    text-decoration: none;
    color: #2c3e50;
    font-weight: bold;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

nav a:hover {
    color: #e74c3c;
    background-color: #f0f2f5;
    text-decoration: underline;
    border-radius: 0 0 5px 5px;
}
```

**Concepts demonstrated:** Sticky navigation, `z-index`, `transition`, hover effects, `list-style: none` for horizontal nav.

---

## Summary of All Concepts Demonstrated

### HTML Concepts

| Concept | Where Used |
|---|---|
| Semantic elements (`<header>`, `<nav>`, `<main>`, `<article>`, `<aside>`, `<footer>`, `<section>`) | All pages |
| Tables (`<table>`, `<thead>`, `<tbody>`, `<tfoot>`, `<caption>`) | Task 7 — `about-books.html` |
| `rowspan` and `colspan` for merging cells | Task 7 — `about-books.html` |
| Forms (`<form>`, `<fieldset>`, `<legend>`, `<label>`, `<input>`) | Task 8 — `registration-form.html` |
| Input types: `text`, `email`, `password`, `date`, `tel`, `file`, `radio`, `checkbox` | Task 8 — `registration-form.html` |
| Form validation attributes: `required`, `pattern`, `title`, `placeholder`, `autofocus` | Task 8 — `registration-form.html` |
| Image maps (`<map>`, `<area>`, `usemap`) | Task 5 — `index.html` |
| Linking external stylesheets with `<link rel="stylesheet">` | Tasks 7, 8, 9, 10 |
| `<audio>` element with `controls` and `autoplay` | `index.html` |

### CSS Concepts

| Concept | Where Used |
|---|---|
| Inline CSS (`style` attribute) | Task 1 — header in `index.html` |
| External CSS (separate `.css` files) | Tasks 7, 8, 9, 10 |
| CSS Variables (`--primary`, `--secondary`, etc.) | `styles.css` |
| Class selectors (`.book-card`, `.offer-card`, etc.) | All tasks |
| Element selectors (`nav`, `table`, `form`, etc.) | Tasks 7, 8 |
| Attribute selectors (`input[type="text"]`) | Task 8 — `form.css` |
| Pseudo-classes (`:hover`, `:focus`, `:nth-child(even)`) | Tasks 5, 7, 8 |
| `box-shadow` and `text-shadow` | Tasks 1, 5, 10 |
| `border-radius` for rounded corners | All tasks |
| `transition` for smooth hover effects | Tasks 5, 9 |
| `@keyframes` and `animation` for pulsing glow | Task 10 — `offers.css` |
| `transform: scale()`, `translateY()`, `rotate()` | Tasks 5, 10 |
| `object-fit: cover` for image sizing | Task 5 |
| `position: sticky` for fixed navbar | Navigation — `styles.css` |
| `position: absolute` for discount badges | Task 10 — `offers.css` |
| `z-index` for layering elements | Navigation — `styles.css` |

### Layout Concepts

| Concept | Where Used |
|---|---|
| Flexbox (`display: flex`) | Task 9 — `layout.css`, Task 10 — `offers.css` |
| `flex: 1` vs `flex: 0 0 250px` (grow vs fixed) | Task 9 — `layout.css` |
| `gap` for spacing flex children | Tasks 5, 9, 10 |
| `flex-wrap: wrap` for responsive wrapping | Task 5 — `index.html` |
| `@media` queries for responsive design | Task 9 — `layout.css` |
| `display: inline-block` for card layouts | Task 5 — `styles.css` |
| `max-width` and `margin: 0 auto` for centering | All tasks |

### Interactivity & UX

| Concept | Where Used |
|---|---|
| Hover effects on cards, links, images, table rows | Tasks 5, 7, 10 |
| CSS animations (`pulse-glow` keyframes) | Task 10 — `offers.css` |
| Focus styles on form inputs | Task 8 — `form.css` |
| Inline event handlers (`onmouseover`, `onmouseout`) | Tasks 1, 5 — `index.html` |

### Best Practices

| Concept | Where Used |
|---|---|
| Separation of concerns (HTML structure vs CSS styling) | Tasks 7, 8, 9, 10 |
| Reusable class-based styling | All tasks |
| Responsive design with media queries | Task 9 |
| Accessibility: `alt` attributes, `label` with `for`, semantic HTML | All pages |

---

### What a Student Is Most Likely to Learn

1. **Inline vs External CSS** — Task 1 uses inline styles directly on elements, while Tasks 7–10 use separate `.css` files. This contrast teaches when and why to use each approach.

2. **Flexbox Layout** — Task 9 is the clearest example of building a two-column layout (content + sidebar) using `display: flex`, `flex: 1`, and `flex: 0 0 250px`. This is foundational for modern web layouts.

3. **CSS Selectors** — The project covers class selectors (`.book-card`), element selectors (`table`), attribute selectors (`input[type="text"]`), and pseudo-classes (`:hover`, `:nth-child`), giving broad exposure to selector types.

4. **Table Structure** — Task 7 demonstrates `<thead>`, `<tbody>`, `<tfoot>`, `<caption>`, `rowspan`, and `colspan`, which are essential for structured data display.

5. **Form Elements & Validation** — Task 8 covers all major input types, `<fieldset>`/`<legend>` grouping, and HTML5 validation attributes (`required`, `pattern`), teaching both structure and client-side validation.

6. **CSS Animations** — Task 10's `@keyframes pulse-glow` animation shows how to create attention-grabbing effects with `animation`, `box-shadow`, and `transform`.

7. **Responsive Design** — The `@media` query in `layout.css` switches from a side-by-side layout to a stacked layout on small screens, demonstrating mobile-first thinking.

8. **Hover & Transition Effects** — Used throughout the project, `transition` and `:hover` pseudo-class create polished, interactive UI elements without JavaScript.
