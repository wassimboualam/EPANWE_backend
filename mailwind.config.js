const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: ["./resources/views/emails/*.blade.php", "./resources/views/components/mail/layout.blade.php"],
    theme: {
        screens: {
            xxs: "375px",
            xs: "475px",
            ...defaultTheme.screens,
        },
        fontFamily: {
            sans: ['"DM Sans"', "system-ui"],
            filament: ["DM Sans", ...defaultTheme.fontFamily.sans],
            serif: ["Georgia", "ui-serif"],
            display: ['"PP Eiko"', "system-ui"],
            mono: ["JetBrains Mono", "monospace"],
        }
    },
};