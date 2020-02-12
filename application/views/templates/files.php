<!-- display status message -->
<p><?php echo $this->session->flashdata('statusMsg'); ?></p>

<!-- file upload form -->
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Choose Files</label>
        <input type="file" name="files_masuk[]" multiple/>
    </div>
    <div class="form-group">
        <input type="submit" name="fileSubmit" value="UPLOAD"/>
    </div>
</form>

