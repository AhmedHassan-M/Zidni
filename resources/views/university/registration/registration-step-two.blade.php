@extends('layouts.master')

@section('title', 'Zidni All Live Sessions page 2')


@section('links')

<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet">

@endsection


@section('contant')


@include('university.registration.registration-header')




  <!-- STEPS -->
  @include('university.components.steps')




  <section class="new__student__container">


        <div class="container">


            
                <input type="file" 
                class="filepond"
                name="filepond_1[]"                
                />


                <input type="file" 
                class="filepond"
                name="filepond_2[]"          
                />
            

                <input type="file" 
                class="filepond"
                name="filepond_3[]"                
                />
            

        </div>



    </section>



@endsection


@section('scripts')



<!-- include FilePond library -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>


<script>


$(document).ready(function() {

    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.registerPlugin(FilePondPluginFileEncode);
    FilePond.registerPlugin(FilePondPluginFilePoster);



    // const inputElement = document.querySelector('input[type="file"]');

    $('input[type=file]').each(function(index){

        let inputElement = this;

        const pond = FilePond.create(inputElement, {
        allowFilePoster : true,
        files: [
            {
                // the server file reference
                source: '12345',
                // set type to local to indicate an already uploaded file
                options: {
                    type: 'local',

                    // stub file information
                    file: {
                        name: `${index}.png`,
                        size: 3001025,
                        type: 'image/png'
                    },

                    // pass poster property
                    // metadata: {
                    //     poster: './poster-image/file.png'
                    // }
                }
            }
        ],
        maxFiles: 1,
        allowBrowse: true,
        required: false,
        allowFileTypeValidation: true,
        maxFileSize: "5MB",
        allowFileTypeValidation: true,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "text/plain",
            "application/pdf",
            "application/doc",
            "application/xlsx",
            "application/rtf",
            "application/x-iwork-pages-sffpages"
        ],
        labelIdle: `<i class="fas fa-cloud-upload-alt"></i>Drag & Drop your passport copy, personal photo, educational certificate or <span class="filepond--label-action">Browse</span>`,
        fileValidateTypeLabelExpectedTypes	 : 'File of invalid type',
        allowFileEncode: true,
        instantUpload: true,
        allowRevert :false,
        token : document.getElementsByName("csrfToken").value,
    });


    // Post Req

    // pond.setOptions({
    //     server: {
    //         timeout: 7000,
    //         process: {
    //             url: '/student/update-documents',
    //             method: 'POST',
    //             headers: {
    //                 'x-customheader': 'Hello World',
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             withCredentials: false,
    //             onload: (response) => console.log(response.key),
    //             onerror: (response) => console.log(response.data),
    //             ondata: (response) => {
    //                 console.log(response);
    //                 // formData.append('Hello', 'World');
    //                 // return formData;
    //             }
    //         },
    //         revert: './revert',
    //         restore: './restore/',
    //         load: './load/',
    //         fetch: './fetch/'
    //     }
    // });

    const currentURL = 'http://'+window.location.hostname+':3000';
    console.log(currentURL);
    pond.setOptions({
    server: {
        url: currentURL,
        timeout: 7000,
        process: {
            url: '/student/update-documents',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            withCredentials: false,
            onload: (response) => {
                console.log(response);
                return response.key;
                },
            onerror: (response) => response.data,
            ondata: (formData) => {
                formData.append('Hello', 'World');
                console.log(formData);
                return formData;
            }
        },
        revert: './revert',
        restore: './restore/',
        load: './load/',
        fetch: './fetch/'
    }
});

    pond.on("addfile", (error, file) => {
        console.log(file);
        console.log(error);
    });


    });
    


});


</script>



@endsection