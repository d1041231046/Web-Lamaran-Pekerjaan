async function loadHTML(selector, file, cssFile) {
    const element = document.querySelector(selector);
    try {
        const response = await fetch(file);
        if (!response.ok) throw new Error(`Gagal memuat ${file}`);
        const html = await response.text();
        element.innerHTML = html;

        if (cssFile && !document.querySelector(`link[href="${cssFile + "?v=" + Date.now()}"]`)) {
        const link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = cssFile;
        document.head.appendChild(link);
        }
    } catch (error) {
        console.error(error);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    loadHTML("header", "header.php", "header.css");
    loadHTML("footer", "footer.php", "footer.css");
});
