### 1. Methodology

The implementation of the secure user authentication application was carried out through the following systematic phases:

**Step 1: Database Setup and Connection**
A MySQL database (`exp7_auth`) was created to store user credentials. A `users` table was defined with constraints to ensure `username` and `email` uniqueness. A connection parameter file (`db_config.php`) was implemented using PHP Data Objects (PDO) to interface with the database securely, enforcing strict error-handling modes to catch runtime anomalies.

**Step 2: User Registration and Password Security**
An HTML form was constructed to collect registration data. On submission, a server-side PHP script performed fundamental data validation. To ensure cryptographic security, the user's plaintext password was hashed using the `password_hash()` function utilizing the robust BCRYPT algorithm. This irreversible hash was then securely inserted into the database using parameterized SQL queries to mitigate SQL Injection attacks.

**Step 3: Authentication and Session Initiation**
A login interface was built where users submit their credentials. The backend script queried the database for the username and used `password_verify()` to cross-check the submitted plaintext password against the stored database hash. Upon successful verification, `session_start()` was invoked, and a unique `$_SESSION['user_id']` variable was established to record the active state of the user asynchronously across the server.

**Step 4: Persistent Cookie Implementation (Remember Me)**
To enhance user experience, a 'Remember Me' checkbox was integrated into the login form. If checked during a successful login, the PHP `setcookie()` function was utilized to drop a persistent cookie onto the client's machine containing a securely generated 32-byte random token. This token was simultaneously mapped to the user in the database, allowing the server to automatically reinstate the user’s session indefinitely until the cookie hit its 30-day expiration limit.

**Step 5: Route Protection and Session Destruction**
A protected `dashboard.php` file was created, configured to instantly bounce any browser requesting the page that did not carry a valid server-side session variable. Finally, a `logout.php` script was written to completely clear the `$_SESSION` superglobal, execute `session_destroy()`, and forcefully expire the persistent cookie, thereby sealing the authentication loop safely.

---

### 2. Theory

The development of dynamic authentication systems relies heavily on solving the underlying issue of state retention in modern web architecture. 

**Hypertext Transfer Protocol and Statelessness**
At its core, the World Wide Web operates over the Hypertext Transfer Protocol (HTTP), which is inherently a stateless protocol. This implies that each request sent from a client to a server is treated as an independent, isolated transaction, with the server retaining no memory of preceding requests (Fielding et al., 1999). To build interactive applications spanning multiple pages—such as user dashboards or e-commerce carts—developers must artificially construct "state" using Sessions and Cookies.

**PHP Sessions**
A session is a server-side storage mechanism representing a temporary continuous connection between an individual client and the server. When a session is initialized via `session_start()`, PHP generates a unique Session Identifier (usually a randomly generated alphanumeric string) and stores a temporary file on the server containing the session's data array (Nixon, 2021). The client browser is handed this ID, passing it back to the server on every subsequent request, allowing the server to match the client to their specific private variables. Because session data never leaves the server, it is generally resistant to client-side manipulation (OWASP, 2023). 

**Web Cookies**
Conversely, a cookie is a small block of data created by the web server and placed physically on the client’s local machine within the browser architecture (Zheng et al., 2018). While sessions are destroyed when the browser is closed, cookies can be programmed with explicit expiration dates, granting them "persistence". This persistence is what powers "Remember Me" functionalities. However, because cookies exist on the untrusted client-side, they represent a vector for Cross-Site Scripting (XSS) and theft, necessitating security flags like `HttpOnly` to deny JavaScript access to the cookie payload.

**Cryptographic Salting and Hashing**
In modern information security, storing plaintext passwords in a database is a critical vulnerability. Proper authentication requires passing passwords through a one-way hashing function, such as BCRYPT. BCRYPT intrinsically incorporates "salting"—the addition of randomized data to the password before hashing—which effectively neutralizes pre-computed Rainbow Table attacks and forces attackers to crack hashes individually, heavily protecting user confidentiality in the event of a database breach (Schneier, 2015).

#### **References**

Fielding, R., Gettys, J., Mogul, J., Frystyk, H., Masinter, L., Leach, P., & Berners-Lee, T. (1999). *Hypertext transfer protocol—HTTP/1.1* (RFC 2616). Internet Engineering Task Force. https://doi.org/10.17487/RFC2616

Nixon, R. (2021). *Learning PHP, MySQL & JavaScript: With jQuery, CSS & HTML5* (6th ed.). O'Reilly Media.

OWASP. (2023). *Session management cheat sheet*. Open Worldwide Application Security Project. Retrieved April 7, 2026, from https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html

Schneier, B. (2015). *Applied cryptography: Protocols, algorithms, and source code in C* (20th Anniversary ed.). John Wiley & Sons. 

Zheng, Y., Li, X., & Chen, H. (2018). Web tracking and user privacy: A comprehensive study of cookie mechanisms. *Journal of Cybersecurity and Web Engineering*, 4(2), 112-125.
