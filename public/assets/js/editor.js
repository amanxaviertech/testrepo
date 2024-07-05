document.addEventListener('DOMContentLoaded', () => {
    // Set up drag and drop events
    const components = document.querySelectorAll('.draggable');
    components.forEach(component => {
        component.addEventListener('dragstart', drag);
    });

    // Add click event listener to canvas to hide property sidebar
    document.getElementById('canvas').addEventListener('click', (e) => {
        if (e.target === document.getElementById('canvas')) {
            document.getElementById('styling').style.display = 'none';
            document.getElementById('elements').style.display = 'block';
        }
    });
});

// Allow dropping elements
function allowDrop(ev) {
    ev.preventDefault();
}

// Drag element
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

// Drop element on canvas
function drop(ev) {
    ev.preventDefault();
    const data = ev.dataTransfer.getData("text");
    const component = document.getElementById(data);
    const clone = component.cloneNode(true);
    clone.className += ' canvas-component'; // Add canvas-specific class

    // Add a specific class name based on the component ID
    const specificClass = `canvas-${data}`;
    clone.classList.add(specificClass);
    clone.removeAttribute('id');
    clone.setAttribute('contenteditable', 'true'); // Make the element editable
    clone.addEventListener('click', showProperties); // Show properties on click
    ev.target.appendChild(clone);
}


// Show property sidebar and set properties of the selected element
let selectedElement = null;
function showProperties(ev) {
    ev.stopPropagation(); // Prevent event bubbling to canvas
    selectedElement = ev.target;
    document.getElementById('elements').style.display = 'none';
    document.getElementById('styling').style.display = 'block';

    // Set property controls to match selected element's properties
    document.getElementById('display').value = getComputedStyle(selectedElement).display;
    document.getElementById('width').value = parseInt(getComputedStyle(selectedElement).width, 10);
    document.getElementById('height').value = parseInt(getComputedStyle(selectedElement).height, 10);
    document.getElementById('padding').value = parseInt(getComputedStyle(selectedElement).padding, 10);
    document.getElementById('margin').value = parseInt(getComputedStyle(selectedElement).margin, 10);
    document.getElementById('font-family').value = getComputedStyle(selectedElement).fontFamily.replace(/"/g, '');
    document.getElementById('font-size').value = parseInt(getComputedStyle(selectedElement).fontSize, 10);
    document.getElementById('font-color').value = rgbToHex(getComputedStyle(selectedElement).color);
    document.getElementById('border-radius').value = parseInt(getComputedStyle(selectedElement).borderRadius, 10);
    document.getElementById('border-width').value = parseInt(getComputedStyle(selectedElement).borderWidth, 10);
    document.getElementById('border-color').value = rgbToHex(getComputedStyle(selectedElement).borderColor);
    document.getElementById('border-style').value = getComputedStyle(selectedElement).borderStyle;
    document.getElementById('background-color').value = rgbToHex(getComputedStyle(selectedElement).backgroundColor);
    document.getElementById('background-image').value = getComputedStyle(selectedElement).backgroundImage.replace('url("', '').replace('")', '');
    document.getElementById('opacity').value = getComputedStyle(selectedElement).opacity;
    document.getElementById('box-shadow').value = getComputedStyle(selectedElement).boxShadow;
    document.getElementById('cursor').value = getComputedStyle(selectedElement).cursor;
}

// Helper function to convert RGB to HEX
function rgbToHex(rgb) {
    const result = rgb.match(/\d+/g).map(Number);
    return `#${result[0].toString(16).padStart(2, '0')}${result[1].toString(16).padStart(2, '0')}${result[2].toString(16).padStart(2, '0')}`;
}

// Update selected element's properties based on user input
    document.getElementById('display').addEventListener('change', (e) => {
        if (selectedElement) selectedElement.style.display = e.target.value;
    });

    document.getElementById('width').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.width = `${e.target.value}px`;
    });

    document.getElementById('height').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.height = `${e.target.value}px`;
    });

    document.getElementById('padding').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.padding = `${e.target.value}px`;
    });

    document.getElementById('margin').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.margin = `${e.target.value}px`;
    });

    document.getElementById('font-family').addEventListener('change', (e) => {
        if (selectedElement) selectedElement.style.fontFamily = e.target.value;
    });

    document.getElementById('font-size').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.fontSize = `${e.target.value}px`;
    });

    document.getElementById('font-color').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.color = e.target.value;
    });

    document.getElementById('border-radius').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.borderRadius = `${e.target.value}px`;
    });

    document.getElementById('border-width').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.borderWidth = `${e.target.value}px`;
    });

    document.getElementById('border-color').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.borderColor = e.target.value;
    });

    document.getElementById('border-style').addEventListener('change', (e) => {
        if (selectedElement) selectedElement.style.borderStyle = e.target.value;
    });

    document.getElementById('background-color').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.backgroundColor = e.target.value;
    });

    document.getElementById('background-image').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.backgroundImage = `url(${e.target.value})`;
    });

    document.getElementById('opacity').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.opacity = e.target.value;
    });

    document.getElementById('box-shadow').addEventListener('input', (e) => {
        if (selectedElement) selectedElement.style.boxShadow = e.target.value;
    });

    document.getElementById('cursor').addEventListener('change', (e) => {
        if (selectedElement) selectedElement.style.cursor = e.target.value;
    });

    function toggleBold() {
        if (selectedElement) {
            const fontWeight = getComputedStyle(selectedElement).fontWeight;
            selectedElement.style.fontWeight = fontWeight === 'bold' || fontWeight >= 700 ? 'normal' : 'bold';
        }
    }

    function toggleUnderline() {
        if (selectedElement) {
            const textDecoration = getComputedStyle(selectedElement).textDecoration;
            selectedElement.style.textDecoration = textDecoration.includes('underline') ? 'none' : 'underline';
        }
    }

// Save the page content
function savePage() {
    const canvas = document.getElementById('canvas').innerHTML;
    fetch('/api/pages', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ html_content: canvas })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Page saved:', data);
    })
    .catch(error => {
        console.error('Error saving page:', error);
    });
}

// Preview Page Function
function previewPage() {
    const canvas = document.getElementById('canvas');
    const canvasContent = canvas.innerHTML;
    const styles = Array.from(document.styleSheets)
        .map(styleSheet => {
            try {
                return Array.from(styleSheet.cssRules)
                    .map(rule => rule.cssText)
                    .join('');
            } catch (e) {
                console.log('Access to stylesheet %s is denied. Ignoring...', styleSheet.href);
                return '';
            }
        })
        .join('\n');
    
    const inlineStyles = Array.from(canvas.querySelectorAll('*'))
        .map(el => {
            const style = el.getAttribute('style');
            if (style) {
                return `${el.tagName.toLowerCase()}[style="${style}"] { ${style} }`;
            }
            return '';
        })
        .join('\n');

    const previewWindow = window.open('', '_blank');
    previewWindow.document.open();
    previewWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Preview Page</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    padding: 20px;
                }
                ${styles}
                ${inlineStyles}
            </style>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        </head>
        <body>
            ${canvasContent}
        </body>
        </html>
    `);
    previewWindow.document.close();
}

