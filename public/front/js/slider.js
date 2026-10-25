//timeline tabs

const tabs = document.querySelectorAll(".tab_btn");
const allContent = document.querySelectorAll(".content");
const leftArrow = document.querySelector(".arrow.left");
const rightArrow = document.querySelector(".arrow.right");
const line = document.querySelector(".line");

let activeIndex = 0; // Track the active tab index
const tabContainer = document.querySelector(".tab_box");

// Function to update active tab and content
function updateTab(index) {
  // Ensure index is within bounds
  if (index < 0) index = tabs.length - 1;
  if (index >= tabs.length) index = 0;

  // Remove active class from all tabs and contents
  tabs.forEach(tab => tab.classList.remove("active"));
  allContent.forEach(content => content.classList.remove("active"));

  // Add active class to the selected tab and content
  tabs[index].classList.add("active");
  allContent[index].classList.add("active");

  // Move the line indicator to the selected tab
  line.style.width = tabs[index].offsetWidth + "px";
  line.style.left = tabs[index].offsetLeft + "px";

  // Scroll the tab container to the active tab
  tabContainer.scroll({
    left: tabs[index].offsetLeft - (tabContainer.offsetWidth / 2) + (tabs[index].offsetWidth / 2),
    behavior: "smooth" // Smooth scroll animation
  });

  activeIndex = index; // Update the active index
}

// Add click event for each tab
tabs.forEach((tab, index) => {
  tab.addEventListener("click", () => {
    updateTab(index);
  });
});

// Arrow navigation
leftArrow.addEventListener("click", () => {
  updateTab(activeIndex - 1); // Move to the previous tab
});

rightArrow.addEventListener("click", () => {
  updateTab(activeIndex + 1); // Move to the next tab
});

// Autoplay every 1 second (1000 milliseconds)
const autoplayInterval = setInterval(() => {
  updateTab(activeIndex + 1); // Move to the next tab
}, 10000);

// Initialize the first tab as active
updateTab(activeIndex);





