let myArray = ["apple", "banana", "cherry", 1, 2, true];
let jsonString = JSON.stringify(myArray);
let toJSON = JSON.parse(jsonString);
console.log(typeof(jsonString));
console.log(jsonString);
console.log(typeof(toJSON));
console.log(toJSON);
// Output: ["apple","banana","cherry",1,2,true]


let data = [
    { name: "Alice", age: 30 },
    { name: "Bob", age: 25 },
    { name: "Charlie", age: 35 },
  ];
  let jsonOutput = JSON.stringify(data, null, 2); // The '2' adds indentation
 // console.log(jsonOutput);
 
let myJSON = '["Ford", "BMW", "Fiat"]';//notation JSON
let my2Array = JSON.parse(myJSON);

/* console.table(my2Array);
console.log(typeof(my2Array));
console.log(jsonString);
console.log(typeof(jsonString));
console.table(my2Array);
console.log(typeof(myArray)); */



