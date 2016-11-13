<template>
    <div class="well" style="background-color: #fff">
        {{note.user.profile.first_name}}
        {{note.user.profile.last_name}}
        <span class="pull-right">{{fixDate(note.updated_at)}}</span>
        <div class="col-xs-12" v-if="!note.is_editing === true">
            <b>{{note.subject}}</b>
            <span style="font-size:.8em;cursor:pointer" class="text-info" v-if="note.user.id === user.id" @click="note.is_editing = !note.is_editing">
                Edit
            </span>
            <br>
            {{note.message}}
        </div>
        <div class="row" v-if="note.is_editing === true">
            <input class="form-control" v-model="note.subject">
            <textarea class="form-control" v-model="note.message"></textarea>
            <button @click="updateNote" class="btn btn-xs btn-success pull-right">SAVE</button>
        </div>
        <div v-if="!note.is_editing === true">
            <div class="row" v-if="note.comments.length > 0">
                <button class="btn btn-xs btn-info pull-right" data-toggle="collapse" data-target="#comments_{{note.id}}">+{{note.comments.length}} Comment(s)</button>
            </div>
            <div class="row" v-if="note.comments.length < 1">
                <div class="col-xs-12">
                    <button class="btn btn-xs btn-info pull-right" data-toggle="collapse" data-target="#newComment_{{note.id}}">New Comment</button><br>
                </div>
                <div id="newComment_{{note.id}}" class="collapse">
                    <span class="input-group">
                        <input class="form-control" placeholder="New Comment..." @keyup.enter="add" v-model="newComment">
                        <span class="input-group-addon"><button class="btn btn-xs btn-info" @click="add"><i class="fa fa-plus"></i></button></span>
                    </span>
                </div>
            </div>
            <div id="comments_{{note.id}}" class="collapse">
                <hr />
                    <div class="row" v-for="comment in note.comments">
                        <div class="col-xs-11 col-xs-offset-1">
                            <div class="row">
                                {{comment.user.profile.first_name}}
                                {{comment.user.profile.last_name}}
                                <span style="font-size: .7em" style="pull-right">
                                    {{fixDate(comment.updated_at)}}
                                </span>
                                <span v-if="comment.user.id === user.id" style="cursor:pointer;font-size:.8em" class="text-info" @click="comment.is_editing = !comment.is_editing">Edit</span>
                            </div>
                            <br>
                            <span v-if="comment && !comment.is_editing === true">{{comment.comment}}</span>
                            <textarea class="form-control" v-model="comment.comment" @keyup.enter="updateComment(comment)" v-if="comment && comment.is_editing === true"></textarea>
                            <button class="btn btn-xs btn-info pull-right" @click="updateComment(comment)" v-if="comment && comment.is_editing === true">SAVE</button>
                            <hr />
                        </div>
                    </div>
                <hr />
                <span class="input-group" v-if="comment && !comment.is_editing === true">
                    <input class="form-control" placeholder="New Comment..." @keyup.enter="add" v-model="newComment">
                    <span class="input-group-addon"><button class="btn btn-xs btn-info" @click="add"><i class="fa fa-plus"></i></button></span>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Vue from '../vue.min.js';
    Vue.use(require('../vue-resource.min.js'));

    export default {
        props: ['noteId'],
        computed: {
        },
        data(){
            return {
                newComment: '',
                user: {},
                note: {},
            };
        },
        methods: {
            fixDate: function(date){
                return moment(date).format('M/D/Y h:M A');
            },
            updateComment: function(comment){
                let component = this;
                let call = Vue.http.post('updateComment', {orderComment : comment.id, comment : comment.comment, _token : window.Laravel.csrfToken});
                call.then(function(response){
                    comment.is_editing = false;
                });
            },
            updateNote: function(){
                let component = this;
                let call = Vue.http.post('updateNote', {note : this.noteId, message : this.note.message, subject : this.note.subject, _token : window.Laravel.csrfToken});
                call.then(function(response){
                    component.note.is_editing = false;
                });
            },
            add: function(){
                let component = this;
                let call = Vue.http.post('addComment', {comment : this.newComment, orderNote : this.noteId, _token : window.Laravel.csrfToken});
                call.then(function(response){
                    component.note.comments.push(response.data);
                    console.log(component.note.comments);
                    component.newComment = '';
                });
            }
        },
        created: function(){
                let component = this;
                let picknote = inkaddict.order.notes.filter(function(note){
                    if(component.noteId == note.id){
                        return true;
                    }
                });
                this.note = picknote[0];
                this.user = inkaddict.user;
        },
        ready(){
        }
    }
</script>