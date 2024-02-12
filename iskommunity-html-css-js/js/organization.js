// Slider Tab Filter
const tabsBox = document.querySelector('.tabs-box');
const leftButton = document.getElementById('leftButton');
const rightButton = document.getElementById('rightButton');
let isDragging = false;
let startX;
let scrollLeft;
let selectedTab = null;

const startDragging = (e) => {
  isDragging = true;
  startX = e.pageX - tabsBox.offsetLeft;
  scrollLeft = tabsBox.scrollLeft;
};

const dragging = (e) => {
  if (!isDragging) return;
  const x = e.pageX - tabsBox.offsetLeft;
  const walk = (x - startX) * 2;
  tabsBox.scrollLeft = scrollLeft - walk;
};

const stopDragging = () => {
  isDragging = false;
};

const moveLeft = () => {
  tabsBox.scrollTo({
    left: tabsBox.scrollLeft - 350,
    behavior: 'smooth' // Smooth scrolling behavior
  });
};

const moveRight = () => {
  tabsBox.scrollTo({
    left: tabsBox.scrollLeft + 350,
    behavior: 'smooth' // Smooth scrolling behavior
  });
};

const handleTabClick = (event) => {
  const clickedTab = event.target;
  
  if (clickedTab === selectedTab) {
    // Deselect the tab if clicked twice
    selectedTab.classList.remove('selected');
    selectedTab = null;
  } else {
    // Deselect the previously selected tab
    if (selectedTab) {
      selectedTab.classList.remove('selected');
    }
    
    // Highlight the newly selected tab
    clickedTab.classList.add('selected');
    selectedTab = clickedTab;
  }
};

const handleScroll = () => {
  if (tabsBox.scrollLeft === 0) {
    leftButton.style.display = 'none';
  } else {
    leftButton.style.display = 'flex';
  }

  if (tabsBox.scrollLeft + tabsBox.clientWidth >= tabsBox.scrollWidth) {
    rightButton.style.display = 'none';
  } else {
    rightButton.style.display = 'flex';
  }
};

leftButton.addEventListener('click', moveLeft);
rightButton.addEventListener('click', moveRight);
tabsBox.addEventListener('mousedown', startDragging);
tabsBox.addEventListener('mousemove', dragging);
tabsBox.addEventListener('mouseup', stopDragging);
tabsBox.addEventListener('mouseleave', stopDragging);
tabsBox.addEventListener('scroll', handleScroll);
window.addEventListener('resize', handleScroll);

// Event delegation for tab clicks
tabsBox.addEventListener('click', (event) => {
  if (event.target.classList.contains('tab')) {
    handleTabClick(event);
  }
});

handleScroll(); // Initial check on load
