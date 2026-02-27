// ===============================
// Crime Record Management - Enhanced JS
// ===============================

console.log("✅ Crime Record Management System - JavaScript Loaded");

// ===============================
// 🌓 THEME TOGGLE
// ===============================

// Load saved theme or default to dark
const savedTheme = localStorage.getItem('theme') || 'dark';
if (savedTheme === 'light') {
    document.body.classList.add('light-theme');
}

// Create theme toggle button
function createThemeToggle() {
    const themeBtn = document.createElement('button');
    themeBtn.classList.add('theme-toggle');
    themeBtn.innerHTML = `<span id="theme-icon">${document.body.classList.contains('light-theme') ? '🌙' : '☀️'}</span> <span id="theme-text">${document.body.classList.contains('light-theme') ? 'Dark' : 'Light'}</span>`;
    
    themeBtn.addEventListener('click', toggleTheme);
    document.body.appendChild(themeBtn);
}

function toggleTheme() {
    document.body.classList.toggle('light-theme');
    const isLight = document.body.classList.contains('light-theme');
    
    // Update button
    document.getElementById('theme-icon').textContent = isLight ? '🌙' : '☀️';
    document.getElementById('theme-text').textContent = isLight ? 'Dark' : 'Light';
    
    // Save preference
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
    
    // Sync theme with iframes
    const iframes = document.querySelectorAll('iframe');
    iframes.forEach(iframe => {
        try {
            const iframeBody = iframe.contentDocument?.body;
            if (iframeBody) {
                if (isLight) {
                    iframeBody.classList.add('light-theme');
                } else {
                    iframeBody.classList.remove('light-theme');
                }
            }
        } catch (e) {
            // Cross-origin iframe, skip
        }
    });
    
    // Animate transition
    document.body.style.transition = 'all 0.3s ease';
}

// Initialize theme toggle when page loads
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', createThemeToggle);
} else {
    createThemeToggle();
}

// Sync theme with iframes on load
window.addEventListener('load', function() {
    const isLight = document.body.classList.contains('light-theme');
    const iframes = document.querySelectorAll('iframe');
    
    iframes.forEach(iframe => {
        iframe.addEventListener('load', function() {
            try {
                const iframeBody = this.contentDocument?.body;
                if (iframeBody && isLight) {
                    iframeBody.classList.add('light-theme');
                }
            } catch (e) {
                // Cross-origin iframe, skip
            }
        });
    });
});

// ===============================
// 🧾 ENHANCED FORM VALIDATION
// ===============================

document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function (e) {
        const inputs = form.querySelectorAll("input[required], textarea[required], select[required]");
        let isValid = true;

        inputs.forEach(input => {
            if (input.value.trim() === "") {
                input.style.border = "2px solid var(--danger-color)";
                input.style.boxShadow = "0 0 5px rgba(239, 68, 68, 0.5)";
                isValid = false;
            } else {
                input.style.border = "2px solid var(--border-color)";
                input.style.boxShadow = "none";
            }
        });

        if (!isValid) {
            e.preventDefault();
            showMessage("⚠️ Please fill all required fields!", "error");
            return;
        }
    });

    // Remove error styling on input
    form.querySelectorAll("input, textarea, select").forEach(input => {
        input.addEventListener("input", function() {
            if (this.value.trim() !== "") {
                this.style.border = "2px solid var(--border-color)";
                this.style.boxShadow = "none";
            }
        });
    });
});

// ===============================
// 🔔 MODERN MESSAGE DISPLAY
// ===============================
function showMessage(msg, type = "success") {
    document.querySelectorAll(".alert-box").forEach(a => a.remove());

    const alert = document.createElement("div");
    alert.classList.add("alert-box", type === "error" ? "alert-error" : "alert-success");
    alert.innerHTML = `<span>${msg}</span>`;

    document.body.appendChild(alert);

    setTimeout(() => {
        alert.style.opacity = "0";
        alert.style.transform = "translateY(-20px)";
        setTimeout(() => alert.remove(), 400);
    }, 3000);
}

// ===============================
// 💡 TABLE ENHANCEMENTS
// ===============================
document.querySelectorAll("table tbody tr").forEach(row => {
    row.addEventListener("click", function(e) {
        if (!e.target.closest("a") && !e.target.closest("button")) {
            this.classList.toggle("selected-row");
        }
    });
});

// ===============================
// 🎨 AUTO-RELOAD IFRAMES
// ===============================
setInterval(() => {
    const iframes = document.querySelectorAll("iframe");
    if (iframes.length > 0 && document.visibilityState === "visible") {
        // Only reload if page is visible (tab is active)
        // Commented out auto-reload to prevent disruption
        // iframes.forEach(iframe => iframe.contentWindow.location.reload());
    }
}, 30000); // Every 30 seconds

// ===============================
// ✨ DYNAMIC STYLING
// ===============================
const style = document.createElement("style");
style.innerHTML = `
.alert-box {
    position: fixed;
    top: 30px;
    right: 30px;
    background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
    color: white;
    padding: 16px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    z-index: 9999;
    transition: all 0.4s ease;
    opacity: 1;
    transform: translateY(0);
    border-left: 4px solid #10b981;
}

.alert-error {
    background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
    border-left: 4px solid #ef4444;
}

.alert-box span {
    display: flex;
    align-items: center;
    gap: 10px;
}

.selected-row {
    background: rgba(37, 99, 235, 0.2) !important;
    transform: scale(1.005);
    box-shadow: 0 0 15px rgba(37, 99, 235, 0.3);
}

/* Smooth page transitions */
body {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
`;
document.head.appendChild(style);

// ===============================
// 📊 CONSOLE INFO
// ===============================
console.log("%c Crime Management System v2.0 ", "background: #2563eb; color: white; font-size: 14px; padding: 5px 10px; border-radius: 5px;");
console.log("✅ All systems operational");
