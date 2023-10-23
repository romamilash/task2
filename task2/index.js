function findElementByAttribute(nodeList, attributeName, attributeValue) {
    return Array.from(nodeList).find(element => element.getAttribute(attributeName) === attributeValue);
}

const selectElement = document.querySelector("select");
selectElement.addEventListener("change", (event) => {
    let value = event.target.value;
    const inputs = document.querySelectorAll("input");
    let foundInput = findElementByAttribute(inputs, 'name', `input_${value}`);
    let foundButton = findElementByAttribute(inputs, 'name', `button_${value}`);
    inputs.forEach((element) => {
        if (element === foundInput || element === foundButton) {
            element.closest('p').style.display = 'inline-block';
        } else {
            element.closest('p').style.display = 'none';
        }
    });
});