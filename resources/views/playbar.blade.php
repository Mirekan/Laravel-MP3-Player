body {
  margin: 0;
}

html, body, #wrap {
  height: 100%;
}

#wrap {
  display: flex;
  flex-direction: column;
}

#content {
  flex: 1;
}

#playbar {
  height: 3rem;
  color: white;
  background: indigo;
  display: flex;
  padding: 0 5%;
  #buttons {
    user-select: none;
    button {
      margin: 0;
      padding: 0;
      border: 0;
      outline: 0;
      background: transparent;
      color: white;
      &:hover {
        cursor: pointer;
        background: rgba(white, 0.1);
      }
    }
    i {
      font-size: 2rem;
      padding: 0.5rem;
    }
  }
  #track {
    flex: 1;
  }
  .track {
    height: 0.5rem;
    background: rgba(black, 0.5);
    border-radius: 0.25rem;
    margin: 1.25rem;
    .knob {
      position: absolute;
      width: 1rem;
      height: 1rem;
      border-radius: 50%;
      background: white;
      transform: translate(-25%, -25%);
      &:hover {
        cursor: pointer;
      }
    }
  }
}
<div id='wrap'>
  <article id='content'></article>
  <footer id='playbar'>
    <div id='buttons'>
      <button id='prev'>
        <i class='material-icons'>skip_previous</i>
      </button>
      <button id='play'>
        <i class='material-icons'>play_arrow</i>
      </button>
      <button id='next'>
        <i class='material-icons'>skip_next</i>
      </button>
    </div>
    <div id='track'>
      <div class='track'>
        <div class='knob'>

        </div>
      </div>
    </div>
  </footer>
</div>
body {
  margin: 0;
}

html, body, #wrap {
  height: 100%;
}

#wrap {
  display: flex;
  flex-direction: column;
}

#content {
  flex: 1;
}

#playbar {
  height: 3rem;
  color: white;
  background: indigo;
  display: flex;
  padding: 0 5%;
  #buttons {
    user-select: none;
    button {
      margin: 0;
      padding: 0;
      border: 0;
      outline: 0;
      background: transparent;
      color: white;
      &:hover {
        cursor: pointer;
        background: rgba(white, 0.1);
      }
    }
    i {
      font-size: 2rem;
      padding: 0.5rem;
    }
  }
  #track {
    flex: 1;
  }
  .track {
    height: 0.5rem;
    background: rgba(black, 0.5);
    border-radius: 0.25rem;
    margin: 1.25rem;
    .knob {
      position: absolute;
      width: 1rem;
      height: 1rem;
      border-radius: 50%;
      background: white;
      transform: translate(-25%, -25%);
      &:hover {
        cursor: pointer;
      }
    }
  }
}

