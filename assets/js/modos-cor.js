const button = document.getElementById('botaomudartema');

    button.addEventListener('click', function() {
      const htmlElement = document.documentElement;

      if (htmlElement.classList.contains('modoclaro')) {
        htmlElement.classList.remove('modoclaro');
      } else {
        htmlElement.classList.add('modoclaro');
      }
    });
   button.addEventListener('click', function() {
   
  const svgContainers = document.querySelectorAll('.svg-container');
    
  svgContainers.forEach(svg => {
      svg.classList.toggle('active');
    });
  });