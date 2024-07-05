<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($page) ? 'Edit ' . $page->title : 'Design New Page' }}</title>
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body, html { height: 100%; margin: 0; }
        .gjs-editor { height: 100%; }
        #gjs {
            border: none;
        }
        /* Theming */
        /* Primary color for the background */
        .gjs-one-bg {
            background-color: #222831;
        }
        /* Secondary color for the text color */
        .gjs-two-color {
            color: rgba(255, 255, 255, 0.7);
        }
        /* Tertiary color for the background */
        .gjs-three-bg {
            background-color: #ec5896;
            color: white;
        }
        /* Quaternary color for the text color */
        .gjs-four-color,
        .gjs-four-color-h:hover {
            color: #F05454;
        }
        /* Custom panel style */
        .custom-panel {
            background-color: #4CAF50;
            color: white;
        }

        #createPageModal{
            z-index: 9999;
        }

    </style>
</head>
<body>
    <div id="gjs"></div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="createPageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Page Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="createForm" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- <div id="successMessage text-success"></div> -->
                <input type="hidden" id="pageId" name="page_id" value="">

                <!-- Page Title -->
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 mb-2">
                        <span class="required">Page Title</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Page Title" name="pageTitle" id="pageTitle" required />
                </div>

                <!-- Page Content -->
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 mb-2">
                        <span class="required">Page Content</span>
                    </label>
                    <textarea class="form-control form-control-solid" placeholder="Enter Page Content" name="pageContent" id="pageContent" required></textarea>
                </div>

                <!-- Page Slug -->
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 mb-2">
                        <span class="required">Page Slug</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="Enter Page Slug" name="pageSlug" id="pageSlug" required />
                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 mb-2">
                        <span class="required">Page Screenshot</span>
                    </label>
                    <input type="file" class="form-control form-control-solid" name="imageData" id="imageData" required />
                </div>

                <!-- Page Status -->
                <div class="d-flex flex-stack mb-8">
                    <div class="me-5">
                        <label class="fs-6">Page Status</label>
                    </div>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input bg-dark border-dark" type="checkbox" name="status" id="status" value="1" checked="checked" />
                        <span class="form-check-label fw-bold text-muted">Active</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="text-center p-2 m-2">
                    <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-danger me-3">Cancel</button>
                    <button type="submit" id="submitButton" value="" class="btn btn-dark">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>



                    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-success text-center">
                            <h5 class="modal-title text-light" id="successModalLabel">Success</h5>
                          </div>
                          <div class="modal-body">
                            <div class="text-center" id="successMessage">oooooooooooooo!</div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-danger text-center">
                            <h5 class="modal-title text-light" id="errorModalLabel">!Errors</h5>
                            <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="text-center" id="errorMessage">oooooooooooooo!</div>
                          </div>
                        </div>
                      </div>
                    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
        const svgText = `<svg style="width:48px;height:48px" viewBox="0 0 24 24">
<path fill="currentColor" d="M18.5,4L19.66,8.35L18.7,8.61C18.25,7.74 17.79,6.87 17.26,6.43C16.73,6 16.11,6 15.5,6H13V16.5C13,17 13,17.5 13.33,17.75C13.67,18 14.33,18 15,18V19H9V18C9.67,18 10.33,18 10.67,17.75C11,17.5 11,17 11,16.5V6H8.5C7.89,6 7.27,6 6.74,6.43C6.21,6.87 5.75,7.74 5.3,8.61L4.34,8.35L5.5,4H18.5Z" />
</svg>`;
const svgLink = `<svg style="width:48px;height:48px" viewBox="0 0 24 24">
<path fill="currentColor" d="M3.9,12C3.9,10.29 5.29,8.9 7,8.9H11V7H7A5,5 0 0,0 2,12A5,5 0 0,0 7,17H11V15.1H7C5.29,15.1 3.9,13.71 3.9,12M8,13H16V11H8V13M17,7H13V8.9H17C18.71,8.9 20.1,10.29 20.1,12C20.1,13.71 18.71,15.1 17,15.1H13V17H17A5,5 0 0,0 22,12A5,5 0 0,0 17,7Z" />
</svg>`;
const svgImage = `<svg style="width:48px;height:48px" viewBox="0 0 24 24">
<path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" />
</svg>`;

const homesvg = '<p>&#8594;</p>'; 

    var editor = grapesjs.init({
        container: '#gjs',
        fromElement: true,
        height: '100%',
        width: 'auto',
        storageManager: {
            type: 'remote',
            stepsBeforeSave: 1,
            urlStore: '/save-page',
            urlLoad: '/load-page',
        },
    });

    var panelManager = editor.Panels;

    // Add custom panel
    const newPanel = panelManager.addPanel({
        id: 'myNewPanel',
        visible: true,
        buttons: [],
        attributes: { class: 'custom-panel' },
    });

    // Add a new button to the custom panel
    const newButton = panelManager.addButton('myNewPanel', {
        id: 'myNewButton',
        className: 'someClass',
        command: 'someCommand',
        attributes: { title: 'Some title' },
        active: false,
        command: function(editor) {
            alert('Button clicked!');
        },
    });

    // Add a new button to the options panel
    const optionsButton = panelManager.addButton('options', {
        id: 'myOptionsButton',
        className: 'someClass',
        command: 'save-page',
        label: '<i class="fa fa-floppy-o"></i>',
        attributes: { title: 'SAVE' },
        active: false,
        command: function(editor) {
            var pageId = {!! isset($page) ? $page->id : 'null' !!};
            // Save the current content using AJAX
            const content = editor.getHtml();
            const css = editor.getCss();
            if (pageId) {
                alert("run with id");
                // Edit existing page
                $.ajax({
                    url: '/admin/update-page/' + pageId,
                    type: 'POST',
                    data: {
                        html: content,
                        css: css,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#successMessage').text(response.message);
                        $('#successModal').modal('show'); 
                        setTimeout(function() {
                            $('#successModal').modal('hide');
                            // location.reload();
                        }, 2000); 
                    },
                    error: function(response) {
                        alert('Error fetching page details.');
                    }
                });
            } else {
                // Open modal for creating new page
                $('#createPageModal').modal('show');
                $('#createForm').off('submit');

                // Handle form submission for creating new page
                $('#createForm').on('submit', function(e) {
                    e.preventDefault();

                    // Create a FormData object
                    var formData = new FormData();
                    
                    // Append form fields
                    formData.append('title', $('#pageTitle').val());
                    formData.append('pcontent', $('#pageContent').val());
                    formData.append('slug', $('#pageSlug').val());
                    formData.append('status', $('#status').val());
                    
                    // Append file input (assuming the file input has id 'imageData')
                    var fileInput = $('#imageData')[0].files[0];
                    formData.append('imageData', fileInput);

                    // Append additional data
                    formData.append('html', content); // Assuming 'content' is a defined variable
                    formData.append('css', css); // Assuming 'css' is a defined variable
                    formData.append('_token', '{{ csrf_token() }}');

                    // AJAX request to create new page
                    $.ajax({
                        url: '/admin/save-page',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#createPageModal').modal('hide');
                            $('#successMessage').text(response.message);
                            $('#successModal').modal('show'); 
                            setTimeout(function() {
                                $('#successModal').modal('hide');
                                // location.reload();
                            }, 2000); 
                        },
                        error: function(response) {
                            // Check if the response has validation errors
                            $('#createPageModal').modal('hide');
                            if (response.status === 422) {
                                var errors = response.responseJSON.errors;
                                var errorMessages = '';
                                
                                $.each(errors, function(key, value) {
                                    errorMessages += value[0] + '<br>';
                                });
                                
                                $('#errorMessage').html(errorMessages);
                                $('#errorModal').modal('show');
                            } else {
                                $('#errorMessage').text('An unexpected error occurred.');
                                $('#errorModal').modal('show');
                            }
                        }
                    });
                });
            }
        },
    });

    // Add screenshot button
    const screenshotButton = panelManager.addButton('options', {
        id: 'screenshotButton',
        className: 'fa fa-camera',
        command: 'take-screenshot',
        attributes: { title: 'Take Screenshot' },
        active: false,
    });

      // Define the screenshot command
      editor.Commands.add('take-screenshot', {
        run: function(editor) {
            const iframe = document.querySelector('#gjs iframe');
            const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
            const iframeBody = iframeDocument.body;

            // Ensure all images are loaded
            const images = iframeDocument.querySelectorAll('img');
            const promises = Array.from(images).map(img => {
                return new Promise((resolve, reject) => {
                    if (img.complete) {
                        resolve();
                    } else {
                        img.onload = resolve;
                        img.onerror = reject;
                    }
                });
            });

            // Once all images are loaded, take the screenshot
            Promise.all(promises).then(() => {
                // Set fixed dimensions for the screenshot
                const fixedWidth = 1024;  // Set your desired width
                const fixedHeight = 768;  // Set your desired height

                // Set the iframe body dimensions to ensure consistent screenshots
                iframeBody.style.width = fixedWidth + 'px';
                iframeBody.style.height = fixedHeight + 'px';

                html2canvas(iframeBody, {
                    width: fixedWidth,
                    height: fixedHeight,
                    useCORS: true,  // Enable CORS
                    logging: true   // Enable logging to check for any errors
                }).then(canvas => {
                    var link = document.createElement('a');
                    link.href = canvas.toDataURL();
                    link.download = 'screenshot.png';
                    link.click();
                }).catch(error => {
                    console.error('Error capturing screenshot:', error);
                });
            }).catch(error => {
                console.error('Error loading images:', error);
            });
        }
    });

    var blockManager = editor.Blocks;

    // Layout blocks
    blockManager.add('one-column-block', {
        label: 'One Column',
        content: `<div style="display: flex; justify-content: space-between; margin-bottom: 20px; padding:10px;">
                    <div style="display: flex; justify-content: center; width:100%; max-width:100%; margin:5px; padding: 10px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Column</div>
                </div>`,
        category: 'Layout',
        media: '<i class="fa fa-square-o" style="font-size:30px;" aria-hidden="true"></i>',
        attributes: { title: 'Insert One column block' }
    });

    blockManager.add('two-column-block', {
        label: 'Two Columns',
        content: `<div style="display: flex; justify-content: space-between; margin-bottom: 20px; padding:10px;">
                    <div style="display: flex; justify-content: center; width:50%; max-width:50%; margin:5px; padding: 10px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Left Column</div>
                    <div style="display: flex; justify-content: center; width:50%; max-width:50%; margin:5px; padding: 10px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Right Column </div>
                </div>`,
        category: 'Layout',
        media: '<i class="fa fa-columns" style="font-size:30px;" aria-hidden="true"></i>',
        attributes: { title: 'Insert two columns block' }
    });

    blockManager.add('three-column-block', {
        label: 'Three Columns',
        content: `<div style="display: flex; justify-content: space-between; margin-bottom: 20px; padding:10px;">
                    <div style="display: flex; justify-content: center; width:50%; max-width:33%; margin:5px; padding: 10px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Column 1</div>
                    <div style="display: flex; justify-content: center; width:50%; max-width:33%; margin:5px; padding: 10px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Column 2</div>
                    <div style="display: flex; justify-content: center; width:50%; max-width:33%; margin:5px; padding: 10px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Column 3</div>
                </div>`,
        category: 'Layout',
        media: '<img src="https://cdn.iconscout.com/icon/free/png-512/free-columns-8487049-6769462.png?f=webp&w=256" style="width:30px; height:30px; color:#fff; margin:10px;"',
        attributes: { title: 'Insert three columns block' }
    });

    blockManager.add('container-block', {
        label: 'Container',
        content: `<div class="container">
                    <h1>Container Title</h1>
                    <p>Container content goes here...</p>
                </div>`,
        category: 'Layout',
        attributes: { title: 'Insert container block' }
    });

    // Basic blocks
    blockManager.add('h1-block', {
        label: 'Heading',
        media: '<i class="fa fa-header" style="font-size:30px;" aria-hidden="true"></i>',
        content: {
        // type: 'h1',
        content: '<h1>Put your title here</h1>',
        style: { padding: '10px' }
        },
        category: 'Basic',
        attributes: { title: 'Insert h1 block' }
    });

    blockManager.add('text-block', {
        label: 'Text',
        media: svgText,
        content: '<p>Insert your text here</p>',
        category: 'Basic',
        attributes: { title: 'Insert text block' }
    });

    blockManager.add('image-block', {
        label: 'Image',
        media: svgImage,
        content: { type: 'image' },
        category: 'Media',
        // activate:true,
        attributes: { title: 'Insert image block' },
    });

        // Buttons start 
        editor.BlockManager.add('primary-button', {
        label: 'Primary Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#3B71CA; color:#fff;">Primary</button>',
        category: 'Buttons',
        media: '<button type="button" class="btn btn-sm btn-primary" >Primary</button>',
        attributes: { title: 'Insert Primary Button' }
        });

        editor.BlockManager.add('secondary-button', {
        label: 'Secondary Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#9FA6B2; color:#fff;">Secondary</button>',
        category: 'Buttons',
        media: '<button type="button" class="btn btn-sm btn-secondary" style="font-size:10px;">Secondary</button>',
        attributes: { title: 'Insert Secondary Button' }
        });
        

        editor.BlockManager.add('info-button', {
        label: 'Info Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#54B4D3; color:#fff;">Info</button>',
        category: 'Buttons',
        media: '<button type="button" class="btn btn-sm btn-info">Info</button>',
        attributes: { title: 'Insert Info Button' }
        });

        editor.BlockManager.add('success-button', {
        label: 'Success Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#14A44D; color:#fff;">Success</button>',
        media: '<button type="button" class="btn btn-sm btn-success">Success</button>',
        category: 'Buttons',
        attributes: { title: 'Insert Success Button' }
        });

        editor.BlockManager.add('danger-button', {
        label: 'Danger Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#DC4C64; color:#fff;">Danger</button>',
        category: 'Buttons',
        media: '<button type="button" class="btn btn-sm btn-danger">Danger</button>',
        attributes: { title: 'Insert Danger Button' }
        });

        editor.BlockManager.add('warning-button', {
        label: 'Warning Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#E4A11B; color:#fff;">Warning</button>',
        category: 'Buttons',
        media: '<button type="button" class="btn btn-sm btn-warning">Warning</button>',
        attributes: { title: 'Insert Warning Button' }
        });

        editor.BlockManager.add('light-button', {
        label: 'Light Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#FBFBFB; color:#332D2D;">Light</button>',
        category: 'Buttons',
        media: '<button type="button" class="btn btn-sm btn-light">Light</button>',
        attributes: { title: 'Insert Light Button' }
        });

        editor.BlockManager.add('dark-button', {
        label: 'Dark Button',
        content: '<button style="display: flex; justify-content: center; margin:5px; border:none; border-radius:5px; padding:10px; background:#332D2D; color:#fff;">Dark</button>',
        category: 'Buttons',
        media: '<button type="button" class="btn btn-sm btn-dark">Dark</button>',
        attributes: { title: 'Insert Dark Button' }
        });

        // Buttons End 

        // Forms and inputs 
        editor.BlockManager.add('Text Input', {
        label: 'input text',
        content: '<input type ="text" style=" margin:5px; >',
        category: 'Forms',
        media: '<i class="fa fa-keyboard-o" style="font-size:30px;" aria-hidden="true"></i>',
        attributes: { title: 'Input text' }
        });

        editor.BlockManager.add('Select Input', {
        label: 'input Select',
        content: '<select style="padding:5px; margin:5px"> <option>Option 01 </option> </select>',
        category: 'Forms',
        media: '<i class="fa fa-keyboard-o" style="font-size:30px;" aria-hidden="true"></i>',
        attributes: { title: 'Input Select ' }
        });
        
        editor.BlockManager.add('textarea', {
        label: 'textarea',
        content: '<textarea style="padding:5px; margin:5px;"></textarea>',
        category: 'Forms',
        media: '<i class="fa fa-keyboard-o" style="font-size:30px;" aria-hidden="true"></i>',
        attributes: { title: 'textarea ' }
        });



    // Set initial content in the editor
    editor.setComponents(`{!! isset($page) ? $page->htmlContent : '' !!}`);

    // Set initial styles in the editor
    editor.setStyle(`{!! isset($page) ? $page->cssContent : '' !!}`);
});

    </script>
</body>
</html>
