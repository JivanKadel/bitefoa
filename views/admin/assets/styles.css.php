<style>


    /* Common classes*/
.error-message {
    color: hsl(19deg 100% 50%);
    font-size: 0.7rem;
    margin-top: 0;
}

	body {
		margin: 0;
		font-family: 'Permanent Marker', cursive;
		background-color: #f9f7f3;
	}

	.sr-only {
		border: 0;
		clip: rect(1px, 1px, 1px, 1px);
		-webkit-clip-path: inset(50%);
		clip-path: inset(50%);
		height: 1px;
		margin: -1px;
		overflow: hidden;
		padding: 0;
		position: absolute;
		width: 1px;
		white-space: nowrap;
	}

	.sidebar {
		height: 100%;
		width: 250px;
		position: fixed;
		top: 0;
		left: 0;
		background-color: #fefefe;
		padding-top: 20px;
		border-right: 2px solid #b5ae60;
	}

	.sidebar h2 {
		color: #8e8d8a;
		text-align: center;
	}

	.sidebar ul {
		list-style-type: none;
		padding: 0;
	}

	.sidebar ul li,
	.sidebar ul form {
		padding: 10px;
	}

	.sidebar ul li a {
		color: #333;
		text-decoration: none;
	}

	.sidebar ul li a:hover {
		background-color: #f4f3ea;
	}

	.logout-form {
		position: fixed;
		bottom: 1rem;
	}

	.logout-btn {
		background-color: transparent;
		font-family: 'Permanent Marker', cursive;
		font-size: 1.1rem;
		cursor: pointer;
		border: 1.5px solid black;
		border-radius: 50%;
		padding: 0.2rem 0.4rem;
	}

	.overview {
		margin-left: 250px;
		padding: 2rem;
		display: flex;
		flex-wrap: wrap;
		gap: 1rem;
	}

	.card {
		width: 300px;
        height: 175px;
	}

	.card:hover {
		cursor: pointer;
		transform: scale(1.01);
	}

	.content {
		margin-left: 250px;
		padding: 20px;
	}

	.card {
		background-color: #fff;
		padding: 20px;
		border-radius: 10px;
		box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
		margin-bottom: 20px;
	}


</style>