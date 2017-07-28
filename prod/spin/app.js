'use strict';

docReady(function () {
  // Get from DB
  var prizes = [{
    id: 1,
    title: 'iPhone7',
    src: 'box1.png'
  }, {
    id: 2,
    title: 'Samsung S7',
    src: 'box2.png'
  }, {
    id: 3,
    title: 'P50,000 Cash',
    src: 'box3.png'
  }, {
    id: 4,
    title: 'P500 load',
    src: 'box1.png'
  }, {
    id: 5,
    title: '3 Tickets',
    src: 'box2.png'
  }, 
  {
    id: 6,
    title: '5 Coins',
    src: 'box3.png'
  },
  {
    id: 7,
    title: '5 Coins',
    src: 'box3.png'
  },
  {
    id: 8,
    title: '5 Coins',
    src: 'box3.png'
  },
  {
    id: 9,
    title: '5 Coins',
    src: 'box3.png'
  },
  {
    id: 10,
    title: '5 Coins',
    src: 'box3.png'
  },
  {
    id: 11,
    title: '5 Coins',
    src: 'box3.png'
  },
  {
    id: 12,
    title: '5 Coins',
    src: 'box3.png'
  }

  ];
  var ln = prizes.length;

  var time = 5;                       // Spin duration in seconds
  var finalRotateAngle = 3240;        // Total degree of spins = (360 * 9 = 9 spins)
  var wheelAngle = 0;
  var wheelEl = document.getElementById('wheel');
  var divWidth = wheelEl.offsetWidth; // The diameter of the wheel.
  var sliceWidth = 360 / ln;          // Each prize slice is offset from 0 degrees by sliceWidth * index

  // Compute initial locations
  for (var i = 0; i < ln; i++) {
    var rotate;
    rotate = sliceWidth * i + (ln % 2 ? 0 : (360 / ln / 2));
    rotate = rotate + sliceWidth * 0.5;
    prizes[i].angle = rotate;         // Save the destination angle
    var newChild = document.createElement('div');
    newChild.innerHTML = i;           // We can do without this; this is a simple label.
    newChild.title = prizes[i].title; // Mouseover
    newChild.className = 'child child-' + i;
    if ('append' in wheelEl) {
      wheelEl.append(newChild);
    } else {
      // IE Support
      wheelEl.appendChild(newChild);
    }
    
    // The child is in the center. Rotate it accordingly, move into its end of the wheel, then re-rotate to normal position
    newChild.style.transform = 'rotate(' + rotate + 'deg) translate(' + (divWidth/2 - 50) + 'px) rotate(-' + rotate + 'deg)';
    newChild.style.background = 'url(images/' + prizes[i].src +')';
  }

  var button = document.getElementById('spin');
  button.addEventListener('click', function () {
    button.setAttribute('disabled', true);

    // Increment the wheel's angle and update the rotate style
    wheelAngle = wheelAngle + finalRotateAngle;
    wheelEl.querySelector('#wheel img').style.transform = "rotate(" + wheelAngle + "deg)";
    
    // Update each child's rotation+translation value usign the same method above. CSS transition handles the rest.
    var winIndex = Math.floor(Math.random() * ln);
    for (var i = 0; i < ln; i++) {
      var rotate = sliceWidth * winIndex;
      prizes[i].angle = prizes[i].angle + finalRotateAngle + rotate;
      var child = document.querySelector('#wheel .child-' + i);
      child.style.transform = 'rotate(' + prizes[i].angle + 'deg) translate(' + (divWidth/2 - 50) + 'px) rotate(-' + prizes[i].angle + 'deg)';
    }

    // Re-enable the button after the spin is finished
    setTimeout(function() {
      button.removeAttribute('disabled');
      var e;
      try {
        e = new CustomEvent('spin-finished', { detail: { prize: prizes[winIndex] }});
      } catch (err) {
        // We're in IE, presumably an older version since IE11 is trying to be normal
        e = document.createEvent('Event');
        e.initEvent('spin-finished', true, true);
        e['detail'] = { prize: prizes[winIndex] };
      }
      
      try {
        wheelEl.dispatchEvent(e);
      } catch (err) {
        // IE again
        wheelEl.target.fireEvent('spin-finished', e);
      }
    }, time * 1000 + 10); // Give 10ms allowance
  });
  
  wheelEl.addEventListener('spin-finished', function (e) {
    console.log('User won', e.detail);
  });
});