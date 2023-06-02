<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document List</title>
    <link rel="stylesheet" href="/assets/css/documents.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
<header>
    <div class="navbar">
        <img src="/assets/images/icon2.png" class="logo">
        <ul>
            <li><a href="/adminhome">Home</a></li>
            <li><a href="/adminabout">About</a></li>
            <li><a href="/adminmap">Virtual Map</a></li>
            <li><a href="/adminsearch">Search Land</a></li>
            <li><a href="/documents">Land Documents</a></li>
            <li><a href="/reports">Reports</a></li>
            <li>
                <a href="/profile">
                    <img src="/assets/images/user.png" alt="Profile" class="user">
                </a>
                <ul class="dropdown">
                    <li><a href="/homepage" onclick="logout()">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<div class="document-page">
    <h1>Document List</h1>

    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Lot Number</th>
                <th>Cad Number</th>
                <th>Size of Area</th>
                <th>Location</th>
                <th>View/Edit/Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($lots as $lot) { ?>
                <tr>
                    <td><?= isset($lot['lot_no']) ? esc($lot['lot_no']) : '' ?></td>
                    <td><?= isset($lot['cad_no']) ? esc($lot['cad_no']) : '' ?></td>
                    <td><?= isset($lot['size_of_area']) ? esc($lot['size_of_area']) : '' ?></td>
                    <td><?= isset($lot['location']) ? esc($lot['location']) : '' ?></td>
                    <td>
                        <a href="/documents/view/<?= isset($lot['id']) ? esc($lot['id']) : '' ?>" class="view-link">View</a>
                        <a href="/land/update/<?= isset($lot['id']) ? esc($lot['id']) : '' ?>" class="edit-link">Edit</a>
                        <a href="/land/delete/<?= isset($lot['id']) ? esc($lot['id']) : '' ?>" class="delete-link" onclick="return confirmDelete()">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <h2 class="upload">Uploaded Files</h2>

    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>File Name</th>
                <th>Original Name</th>
                <th>Upload Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <!-- Start of PHP foreach loop -->
            <?php foreach ($documents as $document) { ?>
                <tr>
                    <td><?= isset($document['file_name']) ? esc($document['file_name']) : '' ?></td>
                    <td><?= isset($document['original_name']) ? esc($document['original_name']) : '' ?></td>
                    <td><?= isset($document['upload_date']) ? esc($document['upload_date']) : '' ?></td>
                    <td>
                        <a href="/documents/download/<?= isset($document['id']) ? esc($document['id']) : '' ?>" class="download-link">Download</a>
                        <a href="/documents/delete/<?= isset($document['id']) ? esc($document['id']) : '' ?>" class="delete-link" onclick="return confirmDelete()">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            <!-- End of PHP foreach loop -->
            </tbody>
        </table>
    </div>


    <div class="button-container">
        <a href="land/add" class="button-link">Add Land Details</a>
        <div class="file-upload">
            <form action="/upload" method="post" enctype="multipart/form-data">
                <label for="fileToUpload">Select PDF file to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf">
                <input type="submit" value="Upload PDF" name="submit">
            </form>
        </div>
    </div>


</div>

<!-- Success message section -->
<?php if (session()->getFlashData('success')) { ?>
    <div class="success-message">
        <?php echo session()->getFlashData('success'); ?>
    </div>
<?php } ?>

<!-- Error message section -->
<?php if (session()->getFlashData('error')) { ?>
    <div class="error-message">
        <?php echo session()->getFlashData('error'); ?>
    </div>
<?php } ?>


<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this file?");
    }
</script>

</body>
</html>
