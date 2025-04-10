// =======================
// MOSTRAR SECCIONES
// =======================
function showSection(sectionId) { 
    let section = document.getElementById(sectionId);
    if (!section) return; // Evita errores si la sección no existe
    
    document.querySelectorAll('.content-section').forEach(sec => sec.classList.remove('active-section')); 
    section.classList.add('active-section'); 
}
