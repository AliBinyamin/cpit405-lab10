function confirmDelete(name) {
  return confirm(`Are you sure you want to delete "${name}"?`);
}

// Simple client-side filter for products table
function filterProducts() {
  const input = document.getElementById("searchInput");
  if (!input) return;

  const filter = input.value.toLowerCase();
  const rows = document.querySelectorAll("#productsTable tbody tr");

  rows.forEach((row) => {
    const name = row.getAttribute("data-name") || "";
    row.style.display = name.includes(filter) ? "" : "none";
  });
}

// Fill quick example for power calculator
function fillExample(base, exp) {
  const baseInput = document.getElementById("base");
  const expInput = document.getElementById("exp");
  if (baseInput && expInput) {
    baseInput.value = base;
    expInput.value = exp;
  }
}

// Auto-fade flash message
document.addEventListener("DOMContentLoaded", () => {
  const flash = document.getElementById("flashMessage");
  if (flash) {
    setTimeout(() => {
      flash.style.transition = "opacity 0.8s ease-out, transform 0.8s ease-out";
      flash.style.opacity = "0";
      flash.style.transform = "translateY(-4px)";
      setTimeout(() => flash.remove(), 900);
    }, 2500);
  }
});