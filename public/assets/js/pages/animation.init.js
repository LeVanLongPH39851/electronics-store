function myFunction() {
    const a = document.querySelector("#animate-me");
    document.querySelectorAll("[data-test]").forEach((t) => {
        t.addEventListener("click", (t) => {
            t = t.target.dataset.test;
            a.classList.add("magictime", t);
        }),
            t.addEventListener("click", (e) => {
                setTimeout(function () {
                    var t = e.target.dataset.test;
                    a.classList.remove("magictime", t);
                }, 1e3);
            });
    });
}
myFunction();
