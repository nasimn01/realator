document.addEventListener("DOMContentLoaded", () => {
  console.log("initing", document.body.classList.contains("theme-dark"))

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
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
         'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
         'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
       ],
      }

  tinymce.init({ selector: "#default", ...themeOptions })
  tinymce.init({
    selector: "#dark",
    toolbar:
      "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
    plugins: "code",
    ...themeOptions,
  })
})
