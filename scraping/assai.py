import time
import requests
from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import os


folder_path = 'assai'

# Check if the folder exists
if os.path.exists(folder_path):
    # Iterate over the files and subdirectories in the folder
    for root, dirs, files in os.walk(folder_path):
        for file in files:
            # Construct the file path and remove it
            file_path = os.path.join(root, file)
            os.remove(file_path)
        for dir in dirs:
            # Construct the subdirectory path and remove it
            dir_path = os.path.join(root, dir)
            os.rmdir(dir_path)
else:
    print(f"The folder '{folder_path}' does not exist.")

# Path to the ChromeDriver executable
chromedriver_path = 'chromedriver'

# Configure Chrome options
chrome_options = Options()
chrome_options.add_argument('--headless')  # Set headless mode

# Create a Chrome WebDriver instance with the configured options
driver = webdriver.Chrome(executable_path=chromedriver_path, options=chrome_options)


# URL of the page to retrieve
url = 'https://www.assai.com.br/ofertas/rio-de-janeiro/assai-campos-dos-goytacazes'

# Load the page
driver.get(url)

# Wait for the page to load (adjust the time as needed)
time.sleep(5)

# Get the updated HTML content after page load
html = driver.page_source

# Create a BeautifulSoup object with the updated page content
soup = BeautifulSoup(html, 'html.parser')

# Find all <img> tags within <a> tags that have property data-fancybox="ofertas"
image_tags = soup.select('a[data-fancybox="ofertas"] img')
#print(image_tags)
#exit

# Create the "imgs" folder if it doesn't exist
if not os.path.exists('assai'):
    os.makedirs('assai')


# Download the images
for i, img in enumerate(image_tags):
    # Extract the src attribute of each <img> tag
    img_url = "https://www.assai.com.br/"+img['src']

    # Filter the image URLs to get only the ones starting with 'http' or 'https'
    if img_url and img_url.startswith('http'):
        # Get the filename from the URL
        filename = f'assai/image_{i}.jpg'

        # Send a GET request to download the image
        image_response = requests.get(img_url)
        if image_response.status_code == 200:
            # Save the image to a file
            with open(filename, 'wb') as f:
                f.write(image_response.content)
                print(f"Image '{filename}' downloaded successfully.")
        else:
            print(f"Failed to download image from URL: {img_url}")

# Quit the driver
driver.quit()