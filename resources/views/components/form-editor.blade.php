<!-- digunakan untuk membuat textarea dengan WYSIWYG -->
@props(['size' => 4, 'field', 'label'])
<div class="input-group mb-2">
    <div class="form-control">
        <div class="bg-white" wire:ignore>
            <div x-data x-init="
                    quill= new Quill($refs.quillEditor, { 
                        theme: 'snow',
                        modules : { 
                            toolbar: [
                                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                                ['blockquote', 'code-block'],

                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                                [{ 'align': [] }],
                                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                            
                                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                                ['link', 'image'],
                                ['clean']                                         // remove formatting button
                            ]
                        },
                    });         
                    window.addEventListener('form-add', (event) => {
                        quill.root.innerHTML = '';
                    });  
                    window.addEventListener('edit-ready', (event) => {
                        quill.root.innerHTML = event.detail.data;
                    });
                    quill.on('text-change', function () {
                        @this.set('{{$field}}', quill.root.innerHTML);                                            
                    });">
                <div x-ref="quillEditor" wire:model.lazy="{{$field}}"></div>
            </div>
        </div>

        @error($field) <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <span class="input-group-text" id="{{$field}}">{{$label}}</span>

</div>