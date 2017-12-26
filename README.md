# Fork of GitHub Activity Stream Widget


Данный модуль является форком [данного модуля](https://github.com/caseyscarborough/github-activity). Наш модуль может отражать активность не только
какого-то одного аккаунта или репозитория, а позволяет выводить на экран неограниченное их количество. Далее приводим текст установки  модуля: 


## Dependencies

The two dependencies for the plugin are the [Mustache](https://github.com/janl/mustache.js/) templating library and [Octicons](https://octicons.github.com/) (if you want the icons to show). You can include these along with the scripts for the plugin in the head of your page with the following HTML:

```html
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
<link rel="stylesheet" href="github-activity-0.1.5.min.css">

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>
<script type="text/javascript" src="github-activity-0.1.5.min.js"></script>
```

The files can be downloaded from the [releases page](https://github.com/caseyscarborough/github-activity/releases).

If you'd like to build the files yourself:

```bash
# Ensure you have grunt and bower installed
npm install bower
npm install grunt-cli

# Clone the repository
git clone https://github.com/diglabby/github-activity.git
cd github-activity

# Install dependencies
bower install

# Build dist
grunt
```

## Usage

To use the library, begin by creating a new div with an id in the body of your page:

```html
<div id="feed"></div>
```

Then call the feed method via Javascript:

```js
GitHubActivity.feed({
	username: "your-username",
	repository: "your-repo", // optional
	selector: "#feed",
	handler: "pathToModule/handler.php" // optional
	limit: 20 // optional
	repositories:{list of users and repositories} // optional
});
```
## Возможны два варианта использования модуля:
1) Оригинальная функциональность. Для ее достижение мы не указываемсвойства handler и repositories. Модуль будет отображать только активность одного пользователя указанного в свойстве username или активность одного репозитория, указанного в  свойствем repository. 
2) Отображение активности множества разных репозиториев или юзеров. Для этого в поле username указываем ник пользователя, сведения о котором будут показываться в шапке модуля. В свойстве handler мы указываем путь до файла handler.php, который находится в папке модуля. В свойстве repositories указывается объект, хранящий список пользователей и отдельных репозиториев, которые необходимо отобразить в модуле гит-хаб активности. Список указывается следующим образом: для добавления всей активности конкретного пользователя, создаётся ключ в виде имени пользователя, которому строкой присвоено значение в виде этого же имени. Для добавления активности избранных репозиториев одного пользователя, создаётся ключ в виде имени пользователя, хранящего значение в виде массива, каждый элемент которого является именем нужного репозитория.
Пример правильно прописанного свойства repositories:
```js
repositories: {
  user:["repository1","repository2"],
  MrKarlKori:"MrKarlKori"
  }
```

## Комментарии и форки приветствуются.
