# Exp 3 Code Evidence - Bookstore Project

This document contains the core JavaScript snippets implemented for the "Exp 3" tasks.

## Task 1: Welcome Message Using DOM
*Implemented in `index.js`*
```javascript
// Shows a popup alert and updates the DOM header
alert("Welcome to Online Book Shop");
document.getElementById("welcome-message").innerHTML = "<h1 style='color: #27ae60;'>Welcome to Online Book Shop</h1>";
```

## Task 2: Data Types (String, Number, Boolean)
*Implemented in `cart.js`*
```javascript
var title = "The Great Gatsby"; // String
var price = 450;                // Number
var inStock = true;            // Boolean

document.getElementById("book-details").innerHTML =
  "<h3>Book Details</h3>" +
  "<table>" +
  "<tr><th>Title</th><td>" + title + "</td></tr>" +
  "<tr><th>Price</th><td>₹" + price + "</td></tr>" +
  "<tr><th>In Stock</th><td>" + inStock + "</td></tr>" +
  "</table>";
```

## Task 3: Operators (Arithmetic)
*Implemented in `cart.js`*
```javascript
var bookPrice = 450;
var quantity = 3;
var total = bookPrice * quantity; // Multiplication operator (*)

document.getElementById("price-calculator").innerHTML =
  "<h3>Price Calculator</h3>" +
  "<table>" +
  "<tr><th>Price per book</th><td>₹" + bookPrice + "</td></tr>" +
  "<tr><th>Quantity</th><td>" + quantity + "</td></tr>" +
  "<tr><th>Total Price</th><td><strong>₹" + total + "</strong></td></tr>" +
  "</table>";
```

## Task 4: Control Flow (If-Else)
*Implemented in `cart.js`*
```javascript
var finalPrice = total;
if (total > 1000) {
  var discount = total * 0.10; // Calculating 10% discount
  finalPrice = total - discount;
  document.getElementById("discount-result").innerHTML = "<h3>Discount Applied</h3>" + ...;
} else {
  document.getElementById("discount-result").innerHTML = "<h3>No Discount</h3>" + ...;
}
```

## Task 5: Control Flow (Switch Case)
*Implemented in `cart.js`*
```javascript
var category = "programming";
var categoryMessage = "";

switch (category) {
  case "programming":
    categoryMessage = "Programming Books";
    break;
  case "novel":
    categoryMessage = "Novel Section";
    break;
  case "kids":
    categoryMessage = "Kids Section";
    break;
  default:
    categoryMessage = "Unknown Category";
}
```

## Task 6: Display Array using Loop
*Implemented in `cart.js`*
```javascript
var books = ["HTML", "CSS", "JavaScript", "Python"];
var bookListHTML = "<h3>Available Books</h3><table>...";

for (var i = 0; i < books.length; i++) {
  // Looping through array and building the HTML display
  bookListHTML = bookListHTML + "<tr><td>" + books[i] + "</td></tr>";
}
```

## Task 7: Function with Arguments & Array `push()`
*Implemented in `cart.js`*
```javascript
var cart = []; // Empty array to store books
var cartPrices = [];

function addToCart(bookName, bookPrice) {
  cart.push(bookName);   // Using push() to add to array
  cartPrices.push(bookPrice);
  updateCartDisplay();   // Logic to refresh table
}
```

## Task 8: Count Items Using `array.length`
*Implemented in `cart.js`*
```javascript
// Displaying count of items dynamically
document.getElementById("cart-count").innerHTML = "Items in cart: " + cart.length;
```

## Task 9: Search Book Using Loop & Control Flow
*Implemented in `cart.js`*
```javascript
var searchQuery = "JavaScript";
var isFound = false;

for (var j = 0; j < books.length; j++) {
  if (books[j] === searchQuery) {
    isFound = true; // Use control flow to flag if found
    break; // Stop searching once found
  }
}
```

## Task 10: For Loop for Final Bill Calculation
*Implemented in `cart.js`*
```javascript
// Integrated into cart update logic
var sum = 0;
for (var k = 0; k < cart.length; k++) {
  // Using loop to iterate through the cart array and sum up prices
  sum = sum + parseInt(cartPrices[k]);
}
// display final sum...
```
