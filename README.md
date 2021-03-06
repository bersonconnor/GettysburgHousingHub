# Gettysburg Housing Hub
## Set up
The following steps are meant for a bash-compatible console. 
1. Navigate to your `public_html` directory
2. Run `git clone <url>` where `<url>` is the url of this GitHub project
3. Navigate to the cloned directory (by default it will be named `GettysburgHousingHub`)
4. Run `sh setup.sh` to have the directories permissions changed for browser usage
## Essential command-line git commands
Use all commands while within this GitHub project's directory.
### Adding New and Edited Files
- To stage a file that you created or made changes to use `git add file_name`
- To commit that file use `git commit -m "Message that describes changes that were made and/or files that were added"`
- To push the committed files to the GitHub project use `git push`
### Getting the Most Recent Version 
- To check if your version is up to date use `git fetch`
- To update your local project with the current version use `git pull`
- **Note**: It is generally good practice to fetch and then if necessary pull prior to pushing changes
## Directory Structure
### [front_end](https://github.com/bersonconnor/GettysburgHousingHub/edit/main/front_end)
Contains HTML and PHP for displaying the user interface and CSS for styling.
- [components](https://github.com/bersonconnor/GettysburgHousingHub/edit/main/front_end/components): Contains static html website components, style sheets, and scripts
- [images](https://github.com/bersonconnor/GettysburgHousingHub/edit/main/front_end/images): Contains all images that appear on the website
- [info](https://github.com/bersonconnor/GettysburgHousingHub/edit/main/front_end/info): Contains text files regarding front end implementation
### [back_end](https://github.com/bersonconnor/GettysburgHousingHub/edit/main/back_end)
Contains PHP and JavaScript for applications functionality.
- [database](https://github.com/bersonconnor/GettysburgHousingHub/edit/main/back_end/database): Contains SQL files to create and interact with the database
  - [sample_data](https://github.com/bersonconnor/GettysburgHousingHub/edit/main/back_end/sample_data): Contains SQL files to insert sample data
