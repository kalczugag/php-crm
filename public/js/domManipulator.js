export class DOMManipulator {
    insertHTMLById(elementId, html, position = "beforeend") {
        const element = document.getElementById(elementId);
        if (element) {
            element.insertAdjacentHTML(position, html);
        } else {
            console.error(`Element with id ${elementId} not found`);
        }
    }

    clearElementById(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            element.innerHTML = "";
        } else {
            console.error(`Element with id ${elementId} not found`);
        }
    }
}
