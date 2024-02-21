<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
  <title>Document</title>
</head>
<body>
  <div class="pdfdown">
    <h1>PDF Downloader Example</h1>
    <button onclick="window.print()">print</button>
    <button id="downloadPdf">Download as PDF</button>
  </div>
  <script>
document.getElementById('downloadPdf').addEventListener('click', () => {
  const element = document.querySelector(".pdfdown");
  
  html2canvas(element).then(canvas => {
    const imgData = canvas.toDataURL('image/png');

    // Dimensions in points (72 points per inch)
    const pdfWidth = 504; // 7 inches
    const pdfHeight = 360; // 5 inches

    // Calculate the scale factor to fit the canvas inside the PDF dimensions
    const scaleX = pdfWidth / canvas.width;
    const scaleY = pdfHeight / canvas.height;
    const scale = Math.min(scaleX, scaleY); // Use the smallest scale to fit the entire content

    const pdf = new window.jspdf.jsPDF({
      orientation: 'landscape',
      unit: 'pt',
      format: [pdfWidth, pdfHeight]
    });

    // Set font size to match web content
    pdf.setFontSize(12); // You can adjust this based on your web content

    // Add the image to the PDF using the calculated scale
    pdf.addImage(imgData, 'PNG', 0, 0, canvas.width * scale, canvas.height * scale);

    pdf.save("download.pdf");
  });
});
</script>


</body>
</html>
