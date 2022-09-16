/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
          
        },
        screens: {
		

			lg: { max: "1023px" },
			sm: { max: "639px" },
			ssm: { min: "640px" },
			llg: { min: "1024px" },
			// => @media (max-width: 639px) { ... }
		},
      
    },
    plugins: [],
};
