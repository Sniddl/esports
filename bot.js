//https://discordapp.com/oauth2/authorize?permissions=268435472&scope=bot&client_id=302871404443861002
//https://finitereality.github.io/permissions/?v=268950592
const Discord = require('discord.js');
const bot = new Discord.Client();
var Redis = require('ioredis');
var redis = new Redis();
var env = require('./discord.json')

bot.on('ready', () => {
  console.log(`
----------------------------------------
               B O T . J S
----------------------------------------`
  );
});


//when the bot disconnects. doesn't work for me
bot.on('disconnect', (event) => {
  console.log('I am Leaving!\n' + event);
});


//when a message is typed in the server
bot.on('message', message => {
  if (message.content === '!roles') {
    try {
      roles = Array.from(message.guild.roles.values())
      redis.set('discord-roles', JSON.stringify(roles))
      for(i in roles) {
        message.reply(roles[i].name);
      }
    } catch (e) {
      message.reply("I can't get the roles from this server. WTF I thought we were cool! :cry:")
    }
  }
});


//When a member joins the server
bot.on("guildMemberAdd", member => {
  let guild = member.guild;
  guild.defaultChannel.sendMessage(`@everyone,
    Welcome our newest member, ${member.user} to the team.`);
  try {
    roles = Array.from(guild.roles.values())
    redis.set('roles', JSON.stringify(roles))
  } catch (e) {
    message.reply("I can't get the roles from this server. WTF I thought we were cool! :cry:")
  }
})


//when the bot joins the server
bot.on("guildCreate", guild => {
  guild.createRole({name: 'New Role for Sniddl'})
    .then(role => {guild.defaultChannel.sendMessage(`Added ${role}`)})
    .catch(console.error)
})
bot.login(env.token);
