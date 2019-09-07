$(document).ready(function() {
    $(".form-select-active").select2();

    $(".form-select-active")
        .select2()
        .change(function() {
            $(this).valid();
        });

    const NewRichTextEditor = () => {
        let activeRichTextEditor = $(".active-rich-text-editor");

        activeRichTextEditor.summernote({
            tabsize: 2,
            height: 300,
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "italic", "underline", "clear"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]],
                ["insert", ["link", "hr"]]
            ],
            disableResizeEditor: true
        });

        $(".note-statusbar").hide();
    };

    NewRichTextEditor();

    const createNewElement = () => {
        let elementCardContainer = $("#lessonElementsContainer1 .lesson-card");

        let lastElementNumber = parseFloat(
            elementCardContainer.last().data("lesson")
        );

        console.log(lastElementNumber);
        lastElementNumber++;

        let newElementCard = `
        
        
            <div class="card lesson-card" data-lesson="${lastElementNumber}">


                <div class="card-header" role="tab" id="lessonElement_${lastElementNumber}">
                    <h5 class="mb-0">


                        <button class="btn btn-link" data-toggle="collapse" data-parent=".lessonElementsContainer" href="#element_${lastElementNumber}"
                                aria-expanded="false" aria-controls="element_${lastElementNumber}">
                        <div class="icon-week-status">

                                <i class="fas fa-plus"></i>
                                <i class="fas fa-minus"></i>

                        </div>
                                                    
                        <span>Element</span>


                        </button>

                        <a class="deleteElement_${lastElementNumber}" id="deleteElement"><i class="fas fa-trash"></i></a>

                    </h5>
                </div>




                <div id="element_${lastElementNumber}" class="collapse" role="tabpanel"
                    aria-labelledby="lessonElement_${lastElementNumber}">
                    <div class="card-block">

                        <div class="form-group">
                            <label for="lessonElementName_${lastElementNumber}">Element Name</label>
                            <input type="text" autocomplete="off" class="form-control" name="lessonElementName_${lastElementNumber}" id="lessonElementName_${lastElementNumber}" placeholder="Element Name">
                        </div>

                        <div class="form-group rich-text-editor-container">
                            <label for="lessonElementContent_${lastElementNumber}">Element Content</label>
                            <textarea class="active-rich-text-editor" id="lessonElementContent_${lastElementNumber}" name="lessonElementContent_${lastElementNumber}"></textarea>
                        </div>

                    </div>
                </div>
            </div>



        
        `;

        if (elementCardContainer.length <= 4) {
            $("#lessonElementsContainer1").append(newElementCard);
            $(`#element_${lastElementNumber - 1}`).collapse("hide");
            $(`#element_${lastElementNumber}`).collapse("show");
        }

        NewRichTextEditor();
    };

    const deleteElement = activeElement => {
        let deleteElement = activeElement
            .parent()
            .parent()
            .parent();

        swal({
            title: "Are you sure you want to delete this element?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function(result) {
            if (result.value) {
                swal({
                    title: "element successfully deleted",
                    type: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Good",
                    confirmButtonClass: "btn btn-success"
                });

                deleteElement.remove();
            }
        });
    };

    $(document).on("click", "#addElement1", function(e) {
        e.preventDefault();
        createNewElement();
    });

    $(document).on("click", "#deleteElement", function(e) {
        e.preventDefault();
        deleteElement($(this));
    });

    $(".dropify_1").dropify({
        messages: {
            default: "Drag and drop a Voice File here or click",
            replace: "Drag and drop or click to replace Voice File",
            remove: "Remove",
            error: "Ooops, something wrong happended.",
            test:
                "Your image should be at minimum 250x250 pixels and maximum 1000x1000 pixels"
        },
        tpl: {
            wrap: '<div class="dropify-wrapper"></div>',
            loader: '<div class="dropify-loader"></div>',
            message:
                '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview:
                '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p><p class="dropify-infos-message">{{ test }}</p></div></div></div>',
            filename:
                '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton:
                '<button type="button" class="dropify-clear">{{ remove }}</button>',
            errorLine: '<p class="dropify-error">{{ error }}</p>',
            errorsContainer:
                '<div class="dropify-errors-container"><ul></ul></div>'
        },
        error: {
            fileSize: "The file size is too big ( {{ value }} max ).",
            minWidth: "The image width is too small ( {{ value }} px min ).",
            maxWidth: "The image width is too big ( {{ value }} px max ).",
            minHeight: "The image height is too small ( {{ value }} px min ).",
            maxHeight: "The image height is too big ( {{ value }}px max ).",
            imageFormat: "The image format is not allowed ( {{ value }} only )."
        }
    });

    const createNewVoice = () => {
        let voiceCardContainer = $("#lessonVoiceContainer1 .voice-card");

        let lastVoiceNumber = parseFloat(
            voiceCardContainer.last().data("voice")
        );

        lastVoiceNumber++;

        console.log(lastVoiceNumber);

        let newVoiceCard = `
        
        <div class="card voice-card" data-voice="${lastVoiceNumber}">


        <div class="card-header" role="tab" id="voiceElement_${lastVoiceNumber}">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-parent=".lessonVoiceContainer" href="#voice_${lastVoiceNumber}"
                        aria-expanded="false" aria-controls="voice_${lastVoiceNumber}">



                <div class="icon-week-status">

                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>

                </div>
                                            
                    <span>Voice Element</span>

                </button>

                <a class="deleteVoice_${lastVoiceNumber}" id="deleteVoice"><i class="fas fa-trash"></i></a>


            </h5>
        </div>



        <div id="voice_${lastVoiceNumber}" class="collapse" role="tabpanel"
            aria-labelledby="voiceElement_${lastVoiceNumber}">


            <div class="card-block">

                    <div class="form-group">

                        <label for="lessonVoiceFile_${lastVoiceNumber}">Voice File</label>

                        <input type="file" id="lessonVoiceFile_${lastVoiceNumber}" name="lessonVoiceFile_${lastVoiceNumber}" class="dropify_${lastVoiceNumber}" data-height="100" data-max-file-size="30M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="mp3 mp4 ogg wav">

                    </div>


                    <div class="form-group rich-text-editor-container">
                        <label for="lessonVoiceContent_${lastVoiceNumber}">Voice Content</label>
                        <textarea class="active-rich-text-editor" id="lessonVoiceContent_${lastVoiceNumber}" name="lessonVoiceContent_${lastVoiceNumber}"></textarea>
                    </div>


            </div>


            
        </div>

    </div>        

        
        `;

        if (voiceCardContainer.length <= 30) {
            $("#lessonVoiceContainer1").append(newVoiceCard);
            $(`#voice_${lastVoiceNumber - 1}`).collapse("hide");
            $(`#voice_${lastVoiceNumber}`).collapse("show");
        }

        $(`.dropify_${lastVoiceNumber}`).dropify({
            messages: {
                default: "Drag and drop a Voice File here or click",
                replace: "Drag and drop or click to replace Voice File",
                remove: "Remove",
                error: "Ooops, something wrong happended.",
                test:
                    "Your image should be at minimum 250x250 pixels and maximum 1000x1000 pixels"
            },
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                message:
                    '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                preview:
                    '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p><p class="dropify-infos-message">{{ test }}</p></div></div></div>',
                filename:
                    '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton:
                    '<button type="button" class="dropify-clear">{{ remove }}</button>',
                errorLine: '<p class="dropify-error">{{ error }}</p>',
                errorsContainer:
                    '<div class="dropify-errors-container"><ul></ul></div>'
            },
            error: {
                fileSize: "The file size is too big ( {{ value }} max ).",
                minWidth:
                    "The image width is too small ( {{ value }} px min ).",
                maxWidth: "The image width is too big ( {{ value }} px max ).",
                minHeight:
                    "The image height is too small ( {{ value }} px min ).",
                maxHeight: "The image height is too big ( {{ value }}px max ).",
                imageFormat:
                    "The image format is not allowed ( {{ value }} only )."
            }
        });

        NewRichTextEditor();
    };

    const deleteVoice = activeVoice => {
        let deleteVoice = activeVoice
            .parent()
            .parent()
            .parent();

        swal({
            title: "Are you sure you want to delete this Voice?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function(result) {
            if (result.value) {
                swal({
                    title: "element successfully deleted",
                    type: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Good",
                    confirmButtonClass: "btn btn-success"
                });

                deleteVoice.remove();
            }
        });
    };

    $(document).on("click", "#addVoice1", function(e) {
        e.preventDefault();
        createNewVoice();
    });

    $(document).on("click", "#deleteVoice", function(e) {
        e.preventDefault();
        deleteVoice($(this));
    });
});
