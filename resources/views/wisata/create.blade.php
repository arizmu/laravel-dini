<x-app-layout>
    @push('css')
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header py-3">

                <div class="d-flex justify-content-between">
                    <h5>Form Input </h5>
                    <a class="btn btn-info" href="{{ route('wisata.index') }}">Kembali</a>
                </div>
            </div>
            <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Wisata</label>
                                <input class="form-control" name="wisata" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat lokasi</label>
                                <textarea class="form-control" name="lokasi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Upload File</label>
                                <input class="form-control" name="image" type="file">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Deskripsi Wisata</label>
                                <textarea class="form-control" id="summernote" style="height: 120pt"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning">
                        Reset Form
                    </button>
                    <button class="btn btn-primary">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>

    @push('js')
        <!-- Page level plugins -->
        <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
        <script script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

        <script>
            // Initialize Summernote editor
            var editor = new Summernote({
                placeholder: '',
                tabsize: 2,
                height: 100
            });

            // Access the Summernote editor using the 'editor' property
            var formEditor = editor.editor;

            // Make sure the 'editor' element exists in your HTML
            var editorElement = document.getElementById('editor');

            // Attach the Summernote editor to the 'editor' element
            editorElement.appendChild(formEditor);
        </script>
    @endpush
</x-app-layout>
