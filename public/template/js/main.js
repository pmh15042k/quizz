$('INPUT[type="file"]').change(function () {
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case "jpg":
        case "JPG":
        case "jpeg":
        case "JPEG":
        case "png":
        case "PNG":
        case "gif":
        case "GIF":
            break;
        default:
            alert("This is not an allowed file type.");
            this.value = "";
    }
});

