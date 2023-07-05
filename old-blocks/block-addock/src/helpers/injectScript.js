/**
 * create script tag for load google map api
 *
 * @param {string} url
 */
export const createScript = url => {
  const s = document.createElement("script");
  s.type = "text/javascript";
  s.async = "async";
  s.src = url;
  const x = document.getElementsByTagName("script")[0];
  // if script
  if (x !== undefined) {
    x.parentNode.insertBefore(s, x);
  } else {
    // insert in head
    const h = document.getElementsByTagName("head")[0];
    h.parentNode.appendChild(s);
  }
  return s;
};

/**
 * control if script for google api exist in page
 */
export const scriptExist = url => {
  const s = document.querySelector(`script[src="${url}"]`);
  return s;
};

/**
 * Verify if script is in page and if window.google exist
 *
 * @param {string} url
 * @param {function} cb
 * @param {object} globalObject - global window key
 */
export const injectScript = (url, cb = () => null, globalObject) => {
  // find the script tag
  let s = scriptExist(url);
  // if not google map script exist
  if (!scriptExist(url)) {
    s = createScript(url);
  }
  // if no window google add event on script tag
  if (globalObject === undefined) {
    s.addEventListener("load", () => {
      cb();
    });
  } else {
    cb();
  }
};

export default injectScript;
