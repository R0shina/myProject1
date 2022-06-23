function add() {
                 
    // Add li element
    var node = document
    .createElement("li");
     
    // Add element into the list
    var textnode = document
    .createTextNode("JS");
     
    // Append the element into the list
    node.appendChild(textnode);
    document.getElementById("myList")
    .appendChild(node);
     
    // Alert message when element gets added
    alert("Element is getting added") ; 
    push.create("hello world");   
}