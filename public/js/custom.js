
    const inpFile=window.document.getElementById("prod_img_file");
    const previewContainer = document.getElementById("product_image_preview_container");
    const previewImage = previewContainer.querySelector(".product_image_preview");

    inpFile.addEventListener("change", function() {

        const file=this.files[0];
        // console.log(file);

        if(file) {

            const reader=new FileReader();

            reader.addEventListener("load", function() {
                previewImage.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);

        }


    });

