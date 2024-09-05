 <style>
 	/* Common classes */
    .error-message {
        color: hsl(19deg 100% 50%);
        font-size: 0.7rem;
        margin-top: 0;
    }

 	:root {
 		font-size: 16px;
 	}

 	.centered-text {
 		text-align: center;
 	}

 	.extra-small {
 		font-size: 1.3rem;
 	}

 	.extra-large {
 		font-size: 3rem;
 	}

 	.no-full-bleed {
 		margin-left: 4rem;
 		margin-right: 4rem;
 	}

 	.dark-light {
 		margin-left: auto;
 	}

 	.dark-light>img {
 		width: 50px;
 	}

 	.hand-drawn-border {
 		border: 2px dashed #614126;
 		/* Brown dashed border */
 		padding: 10px;
 	}

 	/* Description */

 	.section-divider {
 		margin: 2rem 4rem;
 		height: 0;
 		border-bottom: 2px rgb(22, 21, 113) solid;
 	}

 	.welcome-img {
 		max-width: 100%;
 	}

 	.welcome-section {
 		display: flex;
 		max-width: 800px;
 		margin: 2rem auto;
 		gap: 1.5rem;
 		align-items: center;
 	}

 	.welcome-section>* {
 		text-align: center;
 		/* color: #5b3423; */
 	}

 	.cafenoir {
 		color: #5b3423;
 	}

 	.welcome-img>img {
 		max-width: 100%;
 		border-radius: 0.8rem;
 	}

 	.welcome-img>img:hover {
 		border-radius: 1rem;
 	}

 	.find {
 		font-weight: 300;
 		margin-bottom: 0;
 	}

 	.search {
 		font-weight: 100;
 		margin-top: 1.5rem;
 		margin-bottom: 0;
 	}

 	.restro-intro {
 		font-size: 2rem;
 		font-weight: bold;
 		margin-top: 1.5rem;
 	}

 	.description {
 		font-size: 1.2rem;
 	}

 	.desc-section {
 		margin-left: auto;
 		margin-right: auto;
 		max-width: 900px;
 		display: flex;
 		gap: 1rem;
 	}

 	.no-display {
 		display: none;
 	}

 	@media (max-width: 950px) {
 		.welcome-section {
 			width: 90%;
 		}

 		.desc-section {
 			max-width: 90%;
 			flex-direction: column;
 		}
 	}
 </style>