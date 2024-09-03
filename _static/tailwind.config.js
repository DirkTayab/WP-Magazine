/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        generalRegular: ["general-regular"],
        generalMedium: ["general-medium"],
        generalSemiBold: ["general-semibold"],
      },

      fontSize: {
        huge: "clamp(1.8rem, 16vw, 20rem)",
        header: "clamp(1.6rem, 9vw, 5rem)",
        body: "clamp(.8rem, 1vw, 1rem)",
      },

      textColor: {
        light: "rgba(var(--light), <alpha-value>)",
        dark: "rgba(var(--dark), <alpha-value>)",
      },

      backgroundColor: {
        light: "rgba(var(--light), <alpha-value>)",
        dark: "rgba(var(--dark), <alpha-value>)",
      },

      borderColor: {
        light: "rgba(var(--light), <alpha-value>)",
        dark: "rgba(var(--dark), <alpha-value>)",
      },

      keyframes: {
        marquee: {
          "0%": { transform: "translateX(0%)" },
          "100%": { transform: "translateX(-100%)" },
        },
      },

      animation: {
        marquee: "marquee 10s linear infinite",
      },
    },
  },
  plugins: [],
};
