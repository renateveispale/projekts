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

                    $("#title").append("<b>Appended text</b>");

                };
            });

            addEventListener("keyup", event => {
                keypress_count++;
                if (keypress_count > 5){
                    var title = document.getElementById("title").value;
                    @this.set('value', trixEditor.getAttribute('value'));
                    @this.set('title', title);
                    keypress_count = 0;
                    
                }
            });



    </script>
</div>
