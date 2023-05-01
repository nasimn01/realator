// document.addEventListener("DOMContentLoaded", () => {
//     console.log("initing", document.body.classList.contains("theme-dark"));

//     const themeOptions = document.body.classList.contains("theme-dark")
//         ? {
//               skin: "oxide-dark",
//               content_css: "dark",
//           }
//         : {
//               skin: "oxide",
//               height: 400,
//               content_css: "default",
//               plugins: [
//                   "a11ychecker",
//                   "advlist",
//                   "advcode",
//                   "advtable",
//                   "autolink",
//                   "checklist",
//                   "export",
//                   "lists",
//                   "link",
//                   "image",
//                   "charmap",
//                   "preview",
//                   "anchor",
//                   "searchreplace",
//                   "visualblocks",
//                   "powerpaste",
//                   "fullscreen",
//                   "formatpainter",
//                   "insertdatetime",
//                   "media",
//                   "table",
//                   "help",
//                   "wordcount",
//               ],
//           };

//     tinymce.init({ selector: "#default", ...themeOptions });
//     tinymce.init({
//         selector: "#dark",
//         toolbar:
//             "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
//         plugins: "code",
//         ...themeOptions,
//     });
// });
document.addEventListener("DOMContentLoaded", () => {
    console.log("initing", document.body.classList.contains("theme-dark"));

    const themeOptions = document.body.classList.contains("theme-dark")
        ? {
              skin: "oxide-dark",
              content_css: "dark",
          }
        : {
              skin: "oxide",
              height: 400,
              content_css: "default",
              plugins: [
                  "a11ychecker",
                  "advlist",
                  "advcode",
                  "advtable",
                  "autolink",
                  "checklist",
                  "export",
                  "lists",
                  "link",
                  "image",
                  "charmap",
                  "preview",
                  "anchor",
                  "searchreplace",
                  "visualblocks",
                  "powerpaste",
                  "fullscreen",
                  "formatpainter",
                  "insertdatetime",
                  "media",
                  "table",
                  "help",
                  "wordcount",
              ],
              toolbar:
                  "undo redo | formatselect | " +
                  "bold italic backcolor | alignleft aligncenter " +
                  "alignright alignjustify | bullist numlist outdent indent | " +
                  "removeformat | image | help",
              images_upload_handler: function (blobInfo, success, failure) {
                  var xhr, formData;

                  xhr = new XMLHttpRequest();
                  xhr.withCredentials = false;
                  xhr.open("POST", "/realator/admin/upload");

                  xhr.onload = function () {
                      var json;

                      if (xhr.status != 200) {
                          failure("HTTP Error: " + xhr.status);
                          return;
                      }


                      json = JSON.parse(xhr.responseText);

                      if (!json || typeof json.location != "string") {
                          failure("Invalid JSON: " + xhr.responseText);
                          return;
                      }

                      success(json.location);
                  };

                  formData = new FormData();
                  formData.append("file", blobInfo.blob(), blobInfo.filename());

                  xhr.send(formData);
              },
          };

    tinymce.init({ selector: "#default", ...themeOptions });
    tinymce.init({
        selector: "#dark",
        toolbar:
            "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code | image",
        plugins: "code image",
        images_upload_handler: function (blobInfo, success, failure) {
            // same as above
        },
        ...themeOptions,
    });
});
