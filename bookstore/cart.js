alert("Welcome to Online Book Shop");
var title = "The Great Gatsby";

var price = 450;
var inStock = true;

document.getElementById("book-details").innerHTML =
  "<h3>Book Details</h3>" +
  "<table>" +
  "<tr><th>Title</th><td>" + title + "</td></tr>" +
  "<tr><th>Price</th><td>₹" + price + "</td></tr>" +
  "<tr><th>In Stock</th><td>" + inStock + "</td></tr>" +
  "</table>";

var bookPrice = 450;
var quantity = 3;
var total = bookPrice * quantity;

document.getElementById("price-calculator").innerHTML =
  "<h3>Price Calculator</h3>" +
  "<table>" +
  "<tr><th>Price per book</th><td>₹" + bookPrice + "</td></tr>" +
  "<tr><th>Quantity</th><td>" + quantity + "</td></tr>" +
  "<tr><th>Total Price</th><td><strong>₹" + total + "</strong></td></tr>" +
  "</table>";

var finalPrice = total;
if (total > 1000) {
  var discount = total * 0.10;
  finalPrice = total - discount;
  document.getElementById("discount-result").innerHTML =
    "<h3>Discount Applied</h3>" +
    "<table>" +
    "<tr><th>Subtotal</th><td>₹" + total + "</td></tr>" +
    "<tr><th>Discount (10%)</th><td>-₹" + discount + "</td></tr>" +
    "<tr><th>Final Price</th><td><strong>₹" + finalPrice + "</strong></td></tr>" +
    "</table>";
} else {
  document.getElementById("discount-result").innerHTML =
    "<h3>No Discount</h3>" +
    "<table>" +
    "<tr><th>Total</th><td>₹" + total + "</td></tr>" +
    "<tr><th>Status</th><td>No discount applicable (total must be over ₹1000)</td></tr>" +
    "<tr><th>Final Price</th><td><strong>₹" + finalPrice + "</strong></td></tr>" +
    "</table>";
}

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

document.getElementById("category-display").innerHTML =
  "<h3>Category Selection</h3>" +
  "<table>" +
  "<tr><th>Selected category</th><td><strong>" + category + "</strong></td></tr>" +
  "<tr><th>You are browsing</th><td><strong>" + categoryMessage + "</strong></td></tr>" +
  "</table>";

var books = ["HTML", "CSS", "JavaScript", "Python"];
var bookListHTML = "<h3>Available Books</h3><table><thead><tr><th>Book Name</th><th>Price</th><th>Availability</th><th>Action</th></tr></thead><tbody>";

for (var i = 0; i < books.length; i++) {
  var dummyPrice = (i === 0) ? "450" : (i === 1 ? "300" : (i === 2 ? "250" : "500"));
  var availClass = (books[i] === "JavaScript") ? "limited" : "available";
  var availText = (books[i] === "JavaScript") ? "Limited Stock" : "In Stock";

  bookListHTML = bookListHTML + "<tr>" +
    "<td><strong>" + books[i] + "</strong></td>" +
    "<td>₹" + dummyPrice + "</td>" +
    "<td class='" + availClass + "'>" + availText + "</td>" +
    "<td><button onclick=\"addToCart('" + books[i] + "', " + dummyPrice + ")\" style=\"cursor: pointer; padding: 6px 12px; background-color: #27ae60; color: white; border: none; border-radius: 4px;\">Add to Cart</button></td>" +
    "</tr>";
}

bookListHTML = bookListHTML + "</tbody></table>";
document.getElementById("book-list").innerHTML = bookListHTML;

var searchQuery = "JavaScript";
var isFound = false;

for (var j = 0; j < books.length; j++) {
  if (books[j] === searchQuery) {
    isFound = true;
    break; 
  }
}

var searchResultHTML = "<h3>Search Results</h3><p>Searching for: <strong>" + searchQuery + "</strong></p>";
if (isFound) {
  searchResultHTML = searchResultHTML + "<p style='color: #27ae60;'><strong>Status: Book Available</strong></p>";
} else {
  searchResultHTML = searchResultHTML + "<p style='color: #e74c3c;'><strong>Status: Out of Stock</strong></p>";
}
document.getElementById("search-result").innerHTML = searchResultHTML;

var cart = []; 
var cartPrices = []; 

function addToCart(bookName, bookPrice) {
  cart.push(bookName);
  cartPrices.push(bookPrice);

  var cartHTML = "<table><thead><tr><th>Book Name</th><th>Price</th></tr></thead><tbody>";
  var sum = 0;
  for (var k = 0; k < cart.length; k++) {
    cartHTML = cartHTML + "<tr><td>" + cart[k] + "</td><td>₹" + cartPrices[k] + "</td></tr>";
    sum = sum + parseInt(cartPrices[k]);
  }
  cartHTML = cartHTML + "</tbody>";

  if (cart.length > 0) {
    cartHTML = cartHTML + "<tfoot><tr><td><strong>Total Bill</strong></td><td><strong>₹" + sum + "</strong></td></tr></tfoot>";
  }
  cartHTML = cartHTML + "</table>";

  document.getElementById("cart-items").innerHTML = cartHTML;
  document.getElementById("cart-count").innerHTML = "Items in cart: " + cart.length;

  var emptyMessage = document.querySelector(".cart-empty-message");
  if (emptyMessage) {
    emptyMessage.style.display = cart.length > 0 ? "none" : "block";
  }

  document.getElementById("cart-total").innerHTML = "";
}

document.getElementById("cart-items").innerHTML = "<table><thead><tr><th>Book Name</th><th>Price</th></tr></thead><tbody><tr><td colspan='2' style='text-align:center'>No items in cart</td></tr></tbody></table>";
