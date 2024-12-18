/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./application/views/LandingPage/index.php"],
	theme: {
		fontSize: {
			hero: ["48px", "64px"],
			head1: ["47.78px", "56px"],
			head2: ["39.81px", "48px"],
			head3: ["33.18px", "40px"],
			head4: ["27.65px", "32px"],
			head5: ["23.04px", "32px"],
			head6: ["19.2px", "24px"],
			p: ["16px", "24px"],
			psmall: ["13.33px", "16px"],
		},
		extend: {
			backgroundImage: {
				bghero: "url('./assets/tailwind/img/Wireframe.png')",
				bghero100: "url('./assets/tailwind/img/Wireframe100.png')",
				logoitm: "url('./assets/tailwind/img/logoitm.png')",
			},
			colors: {
				base: "#182433",
				accent: "#15B4B0",
				second: "#E6E8E6",
			},
			fontFamily: {
				raleway: ["Raleway", "serif"],
			},
		},
	},
	plugins: [],
};
