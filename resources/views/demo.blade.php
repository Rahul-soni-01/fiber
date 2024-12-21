<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor Example</title>
    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>CKEditor Example</h4>
                    </div>
                    <div class="card-body">
                        <form action="submit_form.php" method="POST">
                            <!-- Textarea with CKEditor -->
                            <div class="mb-3">
                                <label for="creditorName" class="form-label">Blog Name</label>
                                <input type="text" id="creditorName" name="creditor_name" class="form-control" required>
                            </div>
                            <!-- Contact Number -->
                            <div class="mb-3">
                                <label for="contactNumber" class="form-label">Blog category</label>
                                {{-- <input type="text" id="contactNumber" name="contact_number" class="form-control" required> --}}
                                <select class="form-control">  
                                    <option value=""> Sport</option>
                                    <option value=""> News</option>
                                    <option value=""> IT</option>
                                    <option value=""> Stock Market</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="denis" class="form-label">Content</label>
                                <textarea id="denis" name="content" class="form-control" rows="10"></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('denis');
    </script>
    <!-- Bootstrap Bundle Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
