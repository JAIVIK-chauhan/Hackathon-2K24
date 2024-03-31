<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            position: relative; /* Ensure positioning of absolute elements */
        }
        .imageslider{
            width: 100%;
            height: 705px;
            background-image: url("../Images/1.webp");
            background-size: 100% 100%;
            box-shadow: rgba(149,157,165,0.2) 0px 8px 24px;
            animation: changeimage 20s linear infinite ;
        }
        @keyframes changeimage {
            0%{
                background-image: url('../Images/2.jpg');
            }
            25%{
                background-image: url('../Images/3.jpg');
            }
            50%{
                background-image: url('../Images/4.jpg');
            }
            75%{
                background-image: url('../Images/5.jpg');
            } 
        }
        
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.container {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 120px;
  background: #27282c;
}

.button {
  position: fixed; /* Change to fixed position */
  top: 60px; /* Adjust top position */
  right: 60px; /* Adjust right position */
  padding: 16px 30px;
  font-size: 1.5rem;
  color: var(--color);
  border: 2px solid rgba(0, 0, 0, 0.5);
  border-radius: 4px;
  text-shadow: 0 0 15px var(--color);
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0.1rem;
  transition: 0.5s;
  z-index: 1;
}

.button:hover {
  color: #fff;
  border: 2px solid rgba(0, 0, 0, 0);
  box-shadow: 0 0 0px var(--color);
}

.button::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: var(--color);
  z-index: -1;
  transform: scale(0);
  transition: 0.5s;
}

.button:hover::before {
  transform: scale(1);
  transition-delay: 0.5s;
  box-shadow: 0 0 10px var(--color),
    0 0 30px var(--color),
    0 0 60px var(--color);
}

.button span {
  position: absolute;
  background: var(--color);
  pointer-events: none;
  border-radius: 2px;
  box-shadow: 0 0 10px var(--color),
    0 0 20px var(--color),
    0 0 30px var(--color),
    0 0 50px var(--color),
    0 0 100px var(--color);
  transition: 0.5s ease-in-out;
  transition-delay: 0.25s;
}

.button:hover span {
  opacity: 0;
  transition-delay: 0s;
}

.button span:nth-child(1),
.button span:nth-child(3) {
  width: 40px;
  height: 4px;
}

.button:hover span:nth-child(1),
.button:hover span:nth-child(3) {
  transform: translateX(0);
}

.button span:nth-child(2),
.button span:nth-child(4) {
  width: 4px;
  height: 40px;
}

.button:hover span:nth-child(1),
.button:hover span:nth-child(3) {
  transform: translateY(0);
}

.button span:nth-child(1) {
  top: calc(50% - 2px);
  left: -50px;
  transform-origin: left;
}

.button:hover span:nth-child(1) {
  left: 50%;
}

.button span:nth-child(3) {
  top: calc(50% - 2px);
  right: -50px;
  transform-origin: right;
}

.button:hover span:nth-child(3) {
  right: 50%;
}

.button span:nth-child(2) {
  left: calc(50% - 2px);
  top: -50px;
  transform-origin: top;
}

.button:hover span:nth-child(2) {
  top: 50%;
}

.button span:nth-child(4) {
  left: calc(50% - 2px);
  bottom: -50px;
  transform-origin: bottom;
}

.button:hover span:nth-child(4 ) {
  bottom: 50%;
}
    </style>
</head>
<body>
    <div class="imageslider"></div>
    
    
    <div class="container">
  <a class="button" href="form.php" style="--color:#ff0000;">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    Report Your FIR
  </a>
  
</div>
</body>
</html>
