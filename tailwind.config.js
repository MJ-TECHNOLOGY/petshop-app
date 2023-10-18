module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
    "node_modules/flowbite-react/**/*.{js,jsx,ts,tsx}",
    ["./src/**/*.{html,js}", "./node_modules/tw-elements/dist/js/**/*.js"],
  ],
  theme: {
    extend: {
      fontFamily: {
        Montserrat: "Montserrat",
      },

      colors: {
        "color-blue" : "#0000FF",
        "primary-green": "#3a9d56",
        "secondary-red": "#770e0e",
        "tertiary-red": "#d06b6b",
        "primary-blue": "#234787",
        "secondary-blue": "#011047",
        "tertiary-blue": "#5670d3",
        "primary-gray": "#e6e6e6",
        "background-gray": "#f5f5f5",
        "background-gray2": "#fdfdfd",
        "dark-gray": "#707070",
        "avatar-gray": "#d1d5db",
        green: "#2CA216",
        "secondary-dark-gray": "#707070",
      },
      fontSize: {
        "2xs": ".65rem",
      },
      boxShadow: {
        "inner-2": "inset 2px 0 4px 0 rgb(0 0 0 / 0.05);",
      },
    },
  },
  plugins: [
    require("tailwind-scrollbar"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/aspect-ratio"),
    require("flowbite/plugin"),
    require("tw-elements/dist/plugin"),
  ],
};
