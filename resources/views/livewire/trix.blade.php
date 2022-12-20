<div wire:ignore>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    <script src="//unpkg.com/alpinejs" defer></script>

    <label for="body">Body</label>
    <input id="{{ $trixId }}" class = "input_field" type="hidden" name="body" value="{{ $value }}">
    <trix-editor wire:ignore input="{{ $trixId }}"></trix-editor>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script>
        var mimeTypes = ["image/png", "image/jpeg", "image/jpg"];
        var trixEditor = document.getElementById("{{ $trixId }}")
        var titleEditor = document.getElementById("{{ $title }}")
        var keypress_count = 0;

            addEventListener("keypress", event => {
                var title = document.getElementById("title").value;
                if (event.key === "Enter") {
                    @this.set('value', trixEditor.getAttribute('value'));
                    @this.set('title', title);
                };
            });

            addEventListener("keyup", event => {
                console.log(keypress_count);
                keypress_count++;
                if (keypress_count > 5){
                    var title = document.getElementById("title").value;
                    @this.set('value', trixEditor.getAttribute('value'));
                    @this.set('title', title);
                    keypress_count = 0;
                }
            });

        // when user goes outside of the text editor, it updates the values
        // addEventListener("trix-blur", function(event) {
        //     var title = document.getElementById("title").value;
        //     @this.set('value', trixEditor.getAttribute('value'))
        //     @this.set('title', title);
        // });


        // when value in editor changes it updates output valu
        // addEventListener("trix-change", function(event) {
        //     @this.set('value', trixEditor.getAttribute('value'))
        // });

        // addEventListener("keyup", event => {
        //         @this.set('value', trixEditor.getAttribute('value'));
        // });

        addEventListener("trix-file-accept", function(event) {
            if (! mimeTypes.includes(event.file.type) ) {
                // file type not allowed, prevent default upload
                return event.preventDefault();
            }
        });


        addEventListener("trix-attachment-add", function(event){
            uploadTrixImage(event.attachment);
        });

        function uploadTrixImage(attachment){
            // upload with livewire
            @this.upload(
                'photos',
                attachment.file,
                function (uploadedURL) {

                    // We need to create a custom event.
                    // This event will create a pause in thread execution until we get the Response URL from the Trix Component @completeUpload
                    const trixUploadCompletedEvent = `trix-upload-completed:${btoa(uploadedURL)}`;
                    const trixUploadCompletedListener = function(event) {
                        attachment.setAttributes(event.detail);
                        window.removeEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);
                    }

                    window.addEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);

                    // call the Trix Component @completeUpload below
                    @this.call('completeUpload', uploadedURL, trixUploadCompletedEvent);
                },
                function() {},
                function(event){
                    attachment.setUploadProgress(event.detail.progress);
                },
            )
            // complete the upload and get the actual file URL
        }
    </script>
</div>
