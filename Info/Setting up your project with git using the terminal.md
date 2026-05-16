First create an empty Github Repo. (Do not add a readme.md or a template)

When you open the repository it will show something like this:

echo "# Example-Crud" 
>> README.mdgit init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/DennisVanStrien/Example-Crud.git
git push -u origin main

Copy and paste this in the terminal of your project. When you open the Github Repository it should contain all the files.
If it does not follow these steps: (Don't copy the text in the brackets)

git add . (This adds all the files in the project to changes)
git commit -m "message" (This adds a message to your changes/commit. Every commit requires a message)
git push (This pushes your changes to the branch/repo, quite self-explanatory.)

These steps should make sure that you have added all of the items in your project to your Github Repository.
If not, then idk. This worked for me.
