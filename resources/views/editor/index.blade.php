<!DOCTYPE html>
<html>
<head>
    <title>Web Builder</title>
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- <div id="toolbar">
        <button onclick="savePage()" id="savebtn">Save Page</button>
        <button onclick="previewPage()" id="previewbtn">Preview Page</button>
    </div> -->
    <!-- <div id="editor"> -->
        <div id="sidebar">
            <div id="logo">
                <h3>Editor</h3> 
            </div>
            <div id="pCategory">
                <button id="elementsBtn" onclick="showCategory('elements')">Elements</button>
                <button id="stylingBtn" onclick="showCategory('styling')">Styling</button>
            </div>
            <ul id="elements">
                <li>
                    <div class="itemname"  onclick="toggleCategory('layout')"><p>Layouts</p><p class="symbol">&#11163;</p></div>
                    <div id="layout" class="category">
                    <div class="layout">      
                        <div class="element">
                            <div class="draggable" id="component1" draggable="true" ondragstart="drag(event)">
                                <div class="column"></div>
                            </div>
                            <p>01 Column</p>
                        </div>
                        <div class="element"> 
                            <div class="draggable" id="component2" draggable="true" ondragstart="drag(event)">
                                <div class="column"></div>
                                <div class="column"></div>
                            </div>
                            <p>02 Columns</p>
                        </div>
                        <div class="element"> 
                            <div class="draggable" id="component3" draggable="true" ondragstart="drag(event)">
                                <div class="column"></div>
                                <div class="column"></div>
                                <div class="column"></div>
                            </div>
                            <p>03 Columns</p>
                        </div>
                        <div class="element"> 
                            <div class="draggable" id="component4" draggable="true" ondragstart="drag(event)">
                            <div class="column"><i class="material-icons">title</i></div>
                            </div>
                            <p>Title</p>
                        </div>
                        <div class="element"> 
                            <div class="draggable" id="component5" draggable="true" ondragstart="drag(event)">
                            <div class="column"><i class="material-icons">text_fields</i></div>
                            </div>
                            <p>Text Box</p>
                        </div>
                        <div class="element"> 
                            <div class="draggable" id="component6" draggable="true" ondragstart="drag(event)">
                                <div class="column"><i class="material-icons">insert_photo</i></div>
                            </div>
                            <p>Image</p>
                        </div>
                    </div>
                    </div>
                </li>
            </ul>
            <ul id="styling">
                <li>
                    <div class="itemname"  onclick="toggleCategory('layouts')"><p>Layouts</p><p class="symbol">&#11163;</p></div>
                    <div id="layouts" class="category">
                        <div class="singleportion"> 
                        <label for="display">Display</label>
                            <div>
                                <select id="display">
                                    <option value="block">Block</option>
                                    <option value="inline-block">Inline Block</option>
                                    <option value="inline">Inline</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('size')"><p>Size</p><p class="symbol">&#11163;</p></div>
                    <div id="size" class="category">
                        <div class="portion"> 
                            <label for="width">Width</label>
                            <div>  
                                <input type="number" id="width" placeholder="Width">
                                <select id="measure">
                                    <option value="block">%</option>
                                    <option value="inline-block">px</option>
                                    <option value="inline">Inline</option>
                                </select>
                            </div>
                        </div>
                        <div class="portion"> 
                        <label for="height">Height</label>
                            <div>
                                <input type="number" id="height" placeholder="Height">
                                <select id="measure">
                                    <option value="block">%</option>
                                    <option value="inline-block">px</option>
                                    <option value="inline">Inline</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('space')"><p>Spacing</p><p class="symbol">&#11163;</p></div>
                    <div id="space" class="category">
                        <div class="anotherportion"> 
                            <label for="padding">Padding</label>
                            <div class="tlrbbg">
                                <div class="tlrb">
                                    <input type="number" title="Top" id="paddingTop" placeholder="&#11165;">
                                    <input type="number" title="All" id="padding">
                                    <input type="number" title="Left" id="paddingLeft" placeholder="&#11164;">
                                    <input type="number" title="Right" id="paddingRight" placeholder="&#11166;">
                                    <input type="number" title="Bottom" id="paddingBottom" placeholder="&#11167;">
                                    <button title="Link All"><i class="fa fa-link" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="anotherportion"> 
                            <label for="margin">Margin</label>
                            <div class="tlrbbg">
                                <div class="tlrb">
                                    <input type="number" title="Top" id="marginTop" placeholder="&#11165;">
                                    <input type="number" title="Left" id="marginLeft" placeholder="&#11164;">
                                    <input type="number" title="All" id="margin">
                                    <input type="number" title="Right" id="marginRight" placeholder="&#11166;">
                                    <input type="number" title="Bottom" id="marginBottom" placeholder="&#11167;">
                                    <button title="Link All"><i class="fa fa-link" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('text')"><p>Text</p><p class="symbol">&#11163;</p></div>
                    <div id="text" class="category">
                        <div class="anotherportion"> 
                        <label for="margin">Text Align</label>
                            <div class="tlrbbg">
                                <div class="tlrb">
                                <button title="Left Align"><i class="fa fa-align-left" aria-hidden="true"></i></button>
                                <button title="Justify "><i class="fa fa-align-center" aria-hidden="true"></i></button>
                                <button title="Center Align"><i class="fa fa-align-justify" aria-hidden="true"></i></button>
                                <button title="Right Align"><i class="fa fa-align-right" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="singleportion"> 
                            <label for="font-family">Font</label>
                            <div>
                                <select id="font-family">
                                    <option value="Arial">Arial</option>
                                    <option value="Courier New">Courier New</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Times New Roman">Times New Roman</option>
                                    <option value="Verdana">Verdana</option>
                                </select>
                            </div>
                        </div>
                         <div class="portion"> 
                        <label for="font-size">Size</label>
                            <div>
                                <input type="number" id="font-size" min="8" max="72" value="14">
                                <select id="measure">
                                    <option value="block">%</option>
                                    <option value="inline-block">px</option>
                                    <option value="inline">Inline</option>
                                </select>
                            </div>
                        </div>
                        <div class="fcolumn">
                            <input type="color" title="text color" id="font-color">
                            <button title="bold" onclick="toggleBold()" class="togglebtn"> <b>B</b></button>
                            <button title="Underline" onclick="toggleUnderline()" class="togglebtn"><u>U</u></button>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('border')"><p>Border</p><p class="symbol">&#11163;</p></div>
                    <div id="border" class="category">
                        <div class="anotherportion"> 
                        <label for="border-radius">Border Radius</label>
                            <div class="tlrbbg">
                                <div class="tlrb">
                                    <input type="number" title="Top" id="border-top-radius" placeholder="&#11165;">
                                    <input type="number" title="Left" id="border-left-radius" placeholder="&#11164;">
                                    <input type="number" title="All" id="border-radius">
                                    <input type="number" title="Right" id="border-right-radius" placeholder="&#11166;">
                                    <input type="number" title="Bottom" id="border-bottom-radius" placeholder="&#11167;">
                                    <button title="Link All"><i class="fa fa-link" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                         <div class="portion"> 
                            <label for="border-width" placeholder="Px">Border Width</label>
                            <div>
                                <input type="number" title="All" id="border-width">
                                <select id="measure">
                                    <option value="all">All</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                </select>
                            </div>
                        </div>
                        <div class="portion"> 
                        <label for="border-style">Border Style</label>
                            <div>
                                <select id="border-style">
                                    <option value="solid">Solid</option>
                                    <option value="dashed">Dashed</option>
                                    <option value="dotted">Dotted</option>
                                </select>
                                <select id="measure">
                                    <option value="all">All</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                </select>
                            </div>
                        </div>
                        <div class="portion"> 
                            <label for="border-color">Border Color</label>
                            <div>  
                                <input type="color" id="border-color">
                                <select id="measure">
                                    <option value="all">All</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('background')"><p>Background</p><p class="symbol">&#11163;</p></div>
                    <div id="background" class="category">
                        <div class="singleportion"> 
                        <label for="background-color">Color</label>
                            <div>
                                <input type="color" id="background-color">
                            </div>
                        </div>
                        <div class="singleportion"> 
                        <label for="background-image">Image URL</label>
                            <div>
                                <input type="text" id="background-image">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('effects')"><p>Effects</p><p class="symbol">&#11163;</p></div>
                    <div id="effects" class="category">
                        <div class="singleportion"> 
                            <label for="opacity">Opacity</label>
                            <div>
                                <input type="number" id="opacity" min="0" max="1" step="0.1">
                            </div>
                        </div>
                        <div class="singleportion"> 
                        <label for="box-shadow">Box Shadow</label>
                            <div>   
                                <input type="text" id="box-shadow">
                            </div>
                        </div>
                        <div class="singleportion"> 
                            <label for="cursor">Cursor</label>
                            <div>
                                <select id="cursor">
                                    <option value="default">Default</option>
                                    <option value="pointer">Pointer</option>
                                    <option value="move">Move</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div id="footer">
                <button><i class="fa fa-eye" aria-hidden="true"></i></button>
                <button onclick="previewPage()" id="previewbtn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                <button><i class="fa fa-download" aria-hidden="true"></i></button>
            </div>
        </div>
        <a id="closebtn" href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-hand-o-left" aria-hidden="true"></i></a>
        <span id="sidebtn" style="cursor:pointer" onclick="openNav()"><i class="fa fa-hand-o-right"></i></span>
        <div id="canvas" ondrop="drop(event)" ondragover="allowDrop(event)">
            <!-- Canvas content -->
        </div>
        <!-- <div id="property-sidebar">
            <h3>Styling</h3>
            <ul id="property-categories">
                <li>
                    <div class="itemname"  onclick="toggleCategory('layouts')"><p>Layouts</p><p class="symbol">&#11163;</p></div>
                    <div id="layouts" class="category">
                        <label for="display">Display:</label>
                        <select id="display">
                            <option value="block">Block</option>
                            <option value="inline-block">Inline Block</option>
                            <option value="inline">Inline</option>
                        </select>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('size')"><p>Size</p><p class="symbol">&#11163;</p></div>
                    <div id="size" class="category">
                        <label for="width">Width:</label>
                        <input type="number" id="width" placeholder="Width in Pixel">
                        <label for="height">Height:</label>
                        <input type="number" id="height" placeholder="Height in Pixel">
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('space')"><p>Spacing</p><p class="symbol">&#11163;</p></div>
                    <div id="space" class="category">
                        <label for="padding">Padding:</label>
                        <div class="tlrbbg">
                            <div class="tlrb">
                                <input type="number" title="Top" id="paddingTop" placeholder="&#11165;">
                                <div>
                                    <input type="number" title="Left" id="paddingLeft" placeholder="&#11164;">
                                    <input type="number" title="All" id="padding">
                                    <input type="number" title="Right" id="paddingRight" placeholder="&#11166;">
                                </div>
                                <input type="number" title="Bottom" id="paddingBottom" placeholder="&#11167;">
                            </div>
                        </div>
                        <label for="margin">Margin:</label>
                        <div class="tlrbbg">
                            <div class="tlrb">
                                <input type="number" title="Top" id="marginTop" placeholder="&#11165;">
                                <div>
                                    <input type="number" title="Left" id="marginLeft" placeholder="&#11164;">
                                    <input type="number" title="All" id="margin">
                                    <input type="number" title="Right" id="marginRight" placeholder="&#11166;">
                                </div>
                                <input type="number" title="Bottom" id="marginBottom" placeholder="&#11167;">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('text')"><p>Text</p><p class="symbol">&#11163;</p></div>
                    <div id="text" class="category">
                        <label for="font-family">Font:</label>
                        <select id="font-family">
                            <option value="Arial">Arial</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Verdana">Verdana</option>
                        </select>
                        <label for="font-size">Font Size:</label>
                        <input type="number" id="font-size" min="8" max="72" value="14">
                        <div class="fcolumn">
                            <input type="color" id="font-color">
                            <button onclick="toggleBold()" class="togglebtn"> <b>B</b></button>
                            <button onclick="toggleUnderline()" class="togglebtn"><u>U</u></button>
                        </div>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('border')"><p>Border</p><p class="symbol">&#11163;</p></div>
                    <div id="border" class="category">
                        <label for="border-radius">Border Radius:</label>
                        <div class="tlrbbg">
                            <div class="tlrb">
                                <input type="number" title="Top" id="border-top-radius" placeholder="&#11165;">
                                <div>
                                    <input type="number" title="Left" id="border-left-radius" placeholder="&#11164;">
                                    <input type="number" title="All" id="border-radius">
                                    <input type="number" title="Right" id="border-right-radius" placeholder="&#11166;">
                                </div>
                                <input type="number" title="Bottom" id="border-bottom-radius" placeholder="&#11167;">
                            </div>
                        </div>
                        <label for="border-width">Border Width:</label>
                        <div class="tlrbbg">
                            <div class="tlrb">
                                <input type="number" title="Top" id="border-top-width" placeholder="&#11165;">
                                <div>
                                    <input type="number" title="Left" id="border-left-width" placeholder="&#11164;">
                                    <input type="number" title="All" id="border-width">
                                    <input type="number" title="Right" id="border-right-width" placeholder="&#11166;">
                                </div>
                                <input type="number" title="Bottom" id="border-bottom-width" placeholder="&#11167;">
                            </div>
                        </div>
                        <label for="border-color">Border Color:</label>
                        <input type="color" id="border-color">
                        <label for="border-style">Border Style:</label>
                        <select id="border-style">
                            <option value="solid">Solid</option>
                            <option value="dashed">Dashed</option>
                            <option value="dotted">Dotted</option>
                        </select>
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('background')"><p>Background</p><p class="symbol">&#11163;</p></div>
                    <div id="background" class="category">
                        <label for="background-color">Background Color:</label>
                        <input type="color" id="background-color">
                        <label for="background-image">Background Image URL:</label>
                        <input type="text" id="background-image">
                    </div>
                </li>
                <li>
                <div class="itemname"  onclick="toggleCategory('effects')"><p>Effects</p><p class="symbol">&#11163;</p></div>
                    <div id="effects" class="category">
                        <label for="opacity">Opacity:</label>
                        <input type="number" id="opacity" min="0" max="1" step="0.1">
                        <label for="box-shadow">Box Shadow:</label>
                        <input type="text" id="box-shadow">
                        <label for="cursor">Cursor:</label>
                        <select id="cursor">
                            <option value="default">Default</option>
                            <option value="pointer">Pointer</option>
                            <option value="move">Move</option>
                        </select>
                    </div>
                </li>
            </ul>
        </div> -->


    <!-- </div> -->

    <script src="{{ asset('assets/js/editor.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<script>

function showCategory(category) {
    // Hide both sections first
    document.getElementById('elements').style.display = 'none';
    document.getElementById('styling').style.display = 'none';

    // Remove border-bottom from both buttons
    document.getElementById('elementsBtn').style.borderBottom = 'unset';
    document.getElementById('stylingBtn').style.borderBottom = 'unset';

    // Show the selected section
    document.getElementById(category).style.display = 'block';

    // Add border-bottom to the selected button
    if (category === 'elements') {
        document.getElementById('elementsBtn').style.borderBottom = '1px solid #F05454';
    } else if (category === 'styling') {
        document.getElementById('stylingBtn').style.borderBottom = '1px solid #F05454';
    }
}



function toggleCategory(category) {
    const categoryElement = document.getElementById(category);
    const allCategories = document.querySelectorAll('.category');
    const symbolElement = categoryElement.previousElementSibling.querySelector('.symbol');
    const itemnameElement = categoryElement.parentElement.querySelector('.itemname');

    // Close all categories
    allCategories.forEach(cat => {
        if (cat !== categoryElement) {
            cat.classList.remove('open');
            const othersymbolElement = cat.previousElementSibling.querySelector('.symbol');
            othersymbolElement.style.transform = 'rotate(0deg)';
            const otheritemnameElement = cat.parentElement.querySelector('.itemname');
            // otheritemnameElement.style.color = '#000';
            // otheritemnameElement.style.backgroundColor = '#e0e0e0';
        }
    });

    // Toggle the selected category
    categoryElement.classList.contains('open') ? categoryElement.classList.remove('open') : categoryElement.classList.add('open');
    if (categoryElement.classList.contains('open')) {
        symbolElement.style.transform = 'rotate(180deg)';
    } else {
        symbolElement.style.transform = 'rotate(0deg)';
    }

}




</script>
<script>
function openNav() {
  document.getElementById("sidebar").style.width = "250px";
  document.getElementById("canvas").style.marginLeft = "250px";
  document.getElementById("sidebtn").style.marginLeft = "220px";
  document.getElementById("closebtn").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("sidebar").style.width = "0";
  document.getElementById("canvas").style.marginLeft= "0";
  document.getElementById("sidebtn").style.marginLeft= "0";
  document.getElementById("closebtn").style.marginLeft= "0";
}
</script>
</body>
</html>
