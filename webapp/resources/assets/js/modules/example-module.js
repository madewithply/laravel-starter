let exampleMethod = function () {
    console.log("Initialising Example Module");
    addExampleClassToBody();
};

let addExampleClassToBody = function () {
    $('body').addClass("example-class");
};

module.exports = {
    exampleMethod: exampleMethod,
};
