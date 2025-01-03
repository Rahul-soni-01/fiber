<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download PDF Example</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jsPDF and DOMPurify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div id="payment" class="border p-4">
            <h1 class="text-center">Payment Details</h1>
            <p class="text-muted">
                This is an example of payment details to be downloaded as a PDF.
            </p>
        </div>
        <div class="text-center mt-4">
            <button id="download-btn" class="btn btn-primary">Download PDF</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('download-btn').addEventListener('click', function (e) {
                e.preventDefault();

                const { jsPDF } = window.jspdf; // Import jsPDF
                const pdf = new jsPDF(); // Create a new jsPDF instance

                // Get the content to convert to PDF
                const content = document.getElementById('payment');

                // Generate PDF using jsPDF's html method
                pdf.html(content, {
                    callback: function (doc) {
                        // Save the generated PDF
                        doc.save('payment-details.pdf');
                    },
                    x: 10,
                    y: 10,
                    html2canvas: {
                        scale: 1.5 // Improves resolution
                    }
                });
            });
        });
    </script>
</body>
</html>
