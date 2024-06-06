/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./tamplate/**/*.{html,js,php}",
    "./view/**/*.{html,js,php}",
    "./index.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins"],
      },
      colors: {
        s: {
          red: "#CA2535",
          black: "#212121",
          white: "#FBFCFF",
          grey: "#6F6F6F",          
        },
        "ijo-100": "#E9FFF4",
        "ijo-200": "#A8FFD5",
        "ijo-300": "#68FFB5",
        "ijo-400": "#27FF96",
        "ijo-500": "#00BF62",
        "ijo-600": "#007B3F",
      },
    },
    screens: {
      md: "768px",
      lg: "1024px",
    },
  },
  plugins: [],
};
